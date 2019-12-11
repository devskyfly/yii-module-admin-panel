<?php
namespace app\controllers\moduleAdminPanel\contentPanel;

use devskyfly\yiiModuleAdminPanel\controllers\contentPanel\AbstractContentPanelController;
use app\models\moduleAdminPanel\contentPanel\unnamedEntity\UnnamedEntity;
use app\models\moduleAdminPanel\contentPanel\unnamedEntity\UnnamedEntityFilter;

class UnnamedEntityController extends AbstractContentPanelController{
    
    public static function sectionCls()
    {
        return null;
    }

    public function sectionEditorViews()
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

    public function itemLabel()
    {
        return "Список";
    }

    public function entityEditorViews()
    {
        return function($form,$item)
        {
            return [
                [
                    "label"=>"main",
                    "content"=>
                    $form->field($item,'create_date_time')
                    .$form->field($item,'change_date_time')
                    .$form->field($item,'active')->checkbox(['value'=>'Y','uncheckValue'=>'N','checked'=>$item->active=='Y'?true:false])
                    .$form->field($item,'data')
                ],
                
            ];
        };
    }

    public function entityCustomColumns()
    {
        return ["data"];
    }
}