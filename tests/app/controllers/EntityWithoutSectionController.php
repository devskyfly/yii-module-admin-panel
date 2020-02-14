<?php

namespace app\controllers;

use app\models\entityWithoutSection\EntityWithoutSection;
use app\models\entityWithoutSection\EntityWithoutSectionFilter;
use devskyfly\yiiModuleAdminPanel\controllers\contentPanel\AbstractContentPanelController;

class EntityWithoutSectionController extends AbstractContentPanelController
{
    //Classes

    public static function sectionCls()
    {
        return null;
    }
    
    
    public static function entityCls()
    {
        return EntityWithoutSection::class;
    }
    
    public static function entityFilterCls()
    {
        return EntityWithoutSectionFilter::class;
    }
    
    //Views
    public function entityEditorViews()
    {
        return function($form,$item)
        {
            return [
                "label" => "main",
                   "content" =>
                   $form->field($item, 'name')
                   .$form->field($item, 'create_date_time')
                   .$form->field($item, 'change_date_time')
                   .$form->field($item,'active')->checkbox(['value'=>'Y', 'uncheck'=>'N', 'checked'=>$item->active=='Y'?true:false])
               
            ];
        };
    }
    
    public function sectionEditorViews()
    {
        return null;
    }
    
    //Title
    public function itemLabel()
    {
        return "Сущность без секции";
    }
}