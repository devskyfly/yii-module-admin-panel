<?php

namespace app\controllers;

use app\models\unnamedEntity\UnnamedEntity;
use app\models\unnamedEntity\UnnamedEntityFilter;
use devskyfly\yiiModuleAdminPanel\controllers\contentPanel\AbstractContentPanelController;

class UnnamedEntityController extends AbstractContentPanelController
{
    //Classes

    public static function sectionCls()
    {
        return null;
    }
    
    public static function entityCls()
    {
        return UnnamedEntity::class;
    }
    
    public static function entityFilterCls()
    {
        return UnnamedEntityFilter::class;
    }
    
    //Views
    public function entityEditorViews()
    {
        return function($form,$item)
        {
            return [
                [
                    "label" => "main",
                    "content" =>
                    $form->field($item, 'create_date_time')
                    .$form->field($item, 'change_date_time')
                    .$form->field($item,'active')->checkbox(['value'=>'Y', 'uncheck'=>'N', 'checked'=>$item->active=='Y'?true:false])
                ]
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
        return "Реестр";
    }
}