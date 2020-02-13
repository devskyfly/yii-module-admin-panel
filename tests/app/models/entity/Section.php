<?php
namespace app\models\entity;

use devskyfly\yiiModuleAdminPanel\models\contentPanel\AbstractSection;

class Section extends AbstractSection
{
    public static function entityCls()
    {
        return Entity::class;
    }
    
    public function extensions()
    {
        return [];
        /*return [
            'page' = >SectionPageExtension::class
        ];*/
    }
   
    public static function selectListRoute()
    {
        return "/entity/section-select-list";
    }
}