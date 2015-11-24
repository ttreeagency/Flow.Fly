<?php
namespace Ttree\Flow\Fly;

/*
 * This file is part of the Ttre.Flow.Fly package.
 *
 * (c) Contributors of the ttree team - www.ttree.ch
 *
 * This package is Open Source Software. For the full copyright and license
 * information, please view the LICENSE file which was distributed with this
 * source code.
 */

use Ttree\Flow\Fly\Http\RequestHandler;
use TYPO3\Flow\Core\Bootstrap;
use TYPO3\Flow\Package\Package as BasePackage;
use TYPO3\Flow\Annotations as Flow;

/**
 * Package base class of the TYPO3.Setup package.
 *
 * @Flow\Scope("singleton")
 */
class Package extends BasePackage {

    /**
     * Invokes custom PHP code directly after the package manager has been initialized.
     *
     * @param Bootstrap $bootstrap The current bootstrap
     * @return void
     */
    public function boot(Bootstrap $bootstrap) {
        $bootstrap->registerRequestHandler(new RequestHandler($bootstrap));
    }

}
