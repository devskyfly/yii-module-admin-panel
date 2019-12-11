<?php
namespace app\models\moduleAdminPanel\contentPanel\entityWithSection;

use devskyfly\yiiModuleAdminPanel\models\contentPanel\AbstractFile;


class EntityFileExtension extends AbstractFile
{
    protected static function itemCls()
    {
        return Entity::class;
    }
  
}