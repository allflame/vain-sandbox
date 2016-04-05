<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 4/5/16
 * Time: 12:33 PM
 */

namespace Vain\Sandbox\Data\Module\Factory\Exception;

use Vain\Core\Exception\CoreException;
use Vain\Data\Module\Factory\ModuleFactoryInterface;

class SandboxModuleFactoryException extends CoreException
{
    private $moduleFactory;

    /**
     * SandboxModuleFactoryException constructor.
     * @param ModuleFactoryInterface $moduleFactory
     * @param string $message
     * @param int $code
     * @param \Exception $previous
     */
    public function __construct(ModuleFactoryInterface $moduleFactory, $message, $code, \Exception $previous)
    {
        $this->moduleFactory = $moduleFactory;
        parent::__construct($message, $code, $previous);
    }

    /**
     * @return ModuleFactoryInterface
     */
    public function getModuleFactory()
    {
        return $this->moduleFactory;
    }
}