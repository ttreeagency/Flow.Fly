<?php
namespace Ttree\Flow\Fly\Http;

/*
 * This file is part of the Ttre.Flow.Fly package.
 *
 * (c) Contributors of the ttree team - www.ttree.ch
 *
 * This package is Open Source Software. For the full copyright and license
 * information, please view the LICENSE file which was distributed with this
 * source code.
 */

use TYPO3\Flow\Annotations as Flow;

/**
 * A request handler which can handle HTTP requests.
 *
 * @Flow\Scope("singleton")
 * @Flow\Proxy(false)
 */
class RequestHandler extends \TYPO3\Flow\Http\RequestHandler
{

    /**
     * This request handler can handle any web request.
     *
     * @return boolean If the request is a web request, TRUE otherwise FALSE
     * @api
     */
    public function canHandleRequest()
    {
        return false;
    }

    /**
     * Returns the priority - how eager the handler is to actually handle the
     * request.
     *
     * @return integer The priority of the request handler.
     * @api
     */
    public function getPriority()
    {
        return 200;
    }

}
