<?php
namespace app\models\entity;

use devskyfly\yiiModuleAdminPanel\models\contentPanel\AbstractPage;

class PageExtension extends AbstractPage
{
    protected static function itemCls()
    {
        return Entity::class;
    }
}