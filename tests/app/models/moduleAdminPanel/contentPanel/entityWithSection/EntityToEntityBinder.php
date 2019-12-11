<?php
namespace app\models\moduleAdminPanel\contentPanel\entityWithSection;

use devskyfly\yiiModuleAdminPanel\models\contentPanel\AbstractBinder;

class EntityToEntityBinder extends AbstractBinder
{
    protected static function slaveCls()
    {
        return Entity::class;
    }

    protected static function masterCls()
    {
        return Entity::class;
    }
}

