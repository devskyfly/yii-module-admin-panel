<?php
namespace app\models\moduleAdminPanel\contentPanel\entityWithSection;

use devskyfly\yiiModuleAdminPanel\models\contentPanel\AbstractPage;


class EntityPageExtension extends AbstractPage
{
    protected static function itemCls()
    {
        return Entity::class;
    }
  
}