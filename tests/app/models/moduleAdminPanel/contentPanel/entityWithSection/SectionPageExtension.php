<?php
namespace app\models\moduleAdminPanel\contentPanel\entityWithSection;

use devskyfly\yiiModuleAdminPanel\models\contentPanel\AbstractPage;


class SectionPageExtension extends AbstractPage
{
    
    protected static function itemCls()
    {
        return Section::class;
    }
  
}