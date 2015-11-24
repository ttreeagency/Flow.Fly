<?php
namespace Neos;

/*
 * This file is part of the TYPO3.Flow package.
 *
 * (c) Contributors of the Neos Project - www.neos.io
 *
 * This package is Open Source Software. For the full copyright and license
 * information, please view the LICENSE file which was distributed with this
 * source code.
 */

require('./Packages/Framework/TYPO3.Flow/Classes/TYPO3/Flow/Core/Bootstrap.php');

use TYPO3\Flow\Core\Booting\Scripts;
use TYPO3\Flow\Core\Bootstrap;

class FlowServer
{
    protected $preselectedRequestHandlerClassName = 'Ttree\Flow\Fly\Http\RequestHandler';

    /**
     * @var Bootstrap
     */
    protected $bootstrap;

    public function __construct($context)
    {
        $this->initializeServer($context);
    }

    public static function getInstance($context)
    {
        return new FlowServer($context);
    }

    protected function initializeBootstrap($context)
    {
        $context = Bootstrap::getEnvironmentConfigurationSetting('FLOW_CONTEXT') ?: $context;
        $this->bootstrap = new Bootstrap($context);
        $this->bootstrap->setPreselectedRequestHandlerClassName('Ttree\Flow\Fly\Http\RequestHandler');
    }

    protected function initializeServer($context)
    {
        $this->initializeBootstrap($context);

        $this->http = $http = new \swoole_http_server("0.0.0.0", 9501);
        $http->on('WorkerStart', [$this, 'onWorkerStart']);
        $http->on('request', [$this, 'onRequest']);
        $http->start();
    }

    /**
     * Bootstraps the minimal infrastructure, resolves a fitting request handler and
     * then passes control over to that request handler.
     *
     * @return void
     * @api
     */
    public function run()
    {
        $this->bootstrap->run();
    }

    public function onWorkerStart()
    {

    }

    public function onRequest($request, $response)
    {
        $this->run();
    }
}
