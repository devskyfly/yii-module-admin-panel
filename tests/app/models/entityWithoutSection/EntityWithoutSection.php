<?php
namespace app\models\entity;

use devskyfly\yiiModuleAdminPanel\models\contentPanel\AbstractEntity;

class EntityWithoutSection extends AbstractEntity
{
    public static function sectionCls()
    {
        return null;
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
        return "/entity-without-section/section-select-list";
    }
}