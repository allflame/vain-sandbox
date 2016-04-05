<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 4/5/16
 * Time: 12:13 PM
 */

namespace Vain\Sandbox\Data\Module\Factory;

use Vain\Data\Module\Factory\ModuleFactoryInterface;
use Vain\Sandbox\Data\Module\Factory\Exception\UnknownSandboxModuleFactoryException;
use Vain\Sandbox\Data\Module\TimeDataModule;

class SandboxModuleFactory implements ModuleFactoryInterface
{
    /**
     * @inheritDoc
     */
    public function createModule($moduleName)
    {
        switch ($moduleName) {
            case 'system.time' :
                return new TimeDataModule();
                break;
            case
                'system.runtime' :
                return new TimeDataModule();
                break;
            default:
                throw new UnknownSandboxModuleFactoryException($this, $moduleName);
                break;
        }
    }
}