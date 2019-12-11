<?php
namespace app\models\moduleAdminPanel\contentPanel\entityWithoutSection;

use devskyfly\yiiModuleAdminPanel\models\contentPanel\AbstractPage;

class EntityPageExtension extends AbstractPage
{
    protected static function itemCls()
    {
        return EntityWithoutSection::class;
    }
}