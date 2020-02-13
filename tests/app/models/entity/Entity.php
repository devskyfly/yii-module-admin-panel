<?php
namespace app\models\entity;

use devskyfly\yiiModuleAdminPanel\models\contentPanel\AbstractEntity;

class Entity extends AbstractEntity
{
    public static function sectionCls()
    {
        return Section::class;
    }
    
    public function extensions()
    {
        return [];
        /*return [
            'page'=>EntityPageExtension::class
        ];*/
    }

    public function binders(){
        return [];
        /*return [
            'EntityToSubEntityBinder'=>EntityToSubEntityBinder::class,
        ];*/
    }
    
    public static function selectListRoute()
    {
        return "/entity/section-select-list";
    }
}