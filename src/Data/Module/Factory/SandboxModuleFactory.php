<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 4/5/16
 * Time: 12:13 PM
 */

namespace Vain\Sandbox\Data\Module\Factory;

use Vain\Expression\Module\Factory\ModuleFactoryInterface;

class SandboxModuleFactory implements ModuleFactoryInterface
{
    private $basicFactory;

    /**
     * SandboxModuleFactory constructor.
     * @param ModuleFactoryInterface $moduleFactory
     */
    public function __construct(ModuleFactoryInterface $moduleFactory)
    {
        $this->basicFactory = $moduleFactory;
    }

    /**
     * @inheritDoc
     */
    public function createModule($moduleName)
    {
        switch ($moduleName) {
            default:
                return $this->basicFactory->createModule($moduleName);
                break;
        }
    }

    public static function helper_test($a, $b)
    {
        return count($a) * $b;
    }
}