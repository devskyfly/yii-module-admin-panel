<?php
namespace app\models\entity;

use devskyfly\yiiModuleAdminPanel\models\contentPanel\AbstractFile;

class FileExtension extends AbstractFile
{
    protected static function itemCls()
    {
        return Entity::class;
    }
}