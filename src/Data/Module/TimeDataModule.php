<?php
/**
 * Created by PhpStorm.
 * User: allflame
 * Date: 4/5/16
 * Time: 11:31 AM
 */

namespace Vain\Sandbox\Data\Module;

use Vain\Data\Module\AbstractDataModule;
use Vain\Data\Module\DataModuleInterface;

class TimeDataModule extends AbstractDataModule  implements DataModuleInterface
{

    /**
     * DateTimeDataModule constructor.
     */
    public function __construct()
    {
        parent::__construct('system.time');
    }

    /**
     * @inheritDoc
     */
    public function getData(\ArrayAccess $runtimeData = null)
    {
        return new \DateTime();
    }
}