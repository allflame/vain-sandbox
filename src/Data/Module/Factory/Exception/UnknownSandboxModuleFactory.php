<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 4/5/16
 * Time: 12:33 PM
 */

namespace Vain\Sandbox\Data\Module\Factory\Exception;

use Vain\Data\Module\Factory\ModuleFactoryInterface;

class UnknownSandboxModuleFactoryException extends SandboxModuleFactoryException
{
    /**
     * UnknownSandboxModuleFactoryException constructor.
     * @param ModuleFactoryInterface $moduleFactory
     * @param string $name
     */
    public function __construct(ModuleFactoryInterface $moduleFactory, $name)
    {
        parent::__construct($moduleFactory, sprintf('Unknown module %s', $name), 0, null);
    }
}