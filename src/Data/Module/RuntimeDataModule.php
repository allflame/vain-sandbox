<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 4/5/16
 * Time: 12:37 PM
 */

namespace Vain\Sandbox\Data\Module;


use Vain\Data\Module\AbstractDataModule;

class RuntimeDataModule extends AbstractDataModule
{
    /**
     * DateTimeDataModule constructor.
     */
    public function __construct()
    {
        parent::__construct('system.runtime');
    }

    /**
     * @inheritDoc
     */
    public function getData(\ArrayAccess $runtimeData = null)
    {
        return $runtimeData;
    }
}