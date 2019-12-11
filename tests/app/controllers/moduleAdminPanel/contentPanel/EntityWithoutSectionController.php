<?php
namespace app\controllers\moduleAdminPanel\contentPanel;

use app\models\moduleAdminPanel\contentPanel\entityWithoutSection\EntityWithoutSection;
use devskyfly\yiiModuleAdminPanel\controllers\contentPanel\AbstractContentPanelController;

class EntityWithoutSectionController extends AbstractContentPanelController
{
    /**
     * 
     * {@inheritDoc}
     * @see \devskyfly\yiiModuleAdminPanel\controllers\AbstractContentPanelController::sectionItem()
     */
    public static function sectionCls()
    {
        return null;
    }
    
    /**
     * 
     * {@inheritDoc}
     * @see \devskyfly\yiiModuleAdminPanel\controllers\AbstractContentPanelController::entityItem()
     */
    public static function entityCls()
    {
        return EntityWithoutSection::class;
    }
    
    /**
     * 
     * {@inheritDoc}
     * @see \devskyfly\yiiModuleAdminPanel\controllers\AbstractContentPanelController::entityEditorViews()
     */
    public function entityEditorViews()
    {
        return function($form,$item)
        {
            return [
                [
                    "label"=>"main",
                    "content"=>
                    $form->field($item,'name')
                    //.$form->field($item,'code')
                    .$form->field($item,'create_date_time')
                    .$form->field($item,'change_date_time')
                    .$form->field($item,'active')->checkbox(['value'=>'Y','uncheckValue'=>'N','checked'=>$item->active=='Y'?true:false])
                ],
                [
                    "label"=>"seo",
                    "content"=>$form->field($item->extensions['page'],'title')
                    .$form->field($item->extensions['page'],'keywords')
                    .$form->field($item->extensions['page'],'description')
                    .$form->field($item->extensions['page'],'preview_text')
                    .$form->field($item->extensions['page'],'detail_text')
                ]
            ];
        };
    }
    
    /**
     * 
     * {@inheritDoc}
     * @see \devskyfly\yiiModuleAdminPanel\controllers\AbstractContentPanelController::sectionEditorItems()
     */
    public function sectionEditorViews()
    {
        return null;
    }
    
    /**
     * 
     * {@inheritDoc}
     * @see \devskyfly\yiiModuleAdminPanel\controllers\AbstractContentPanelController::itemLabel()
     */
    public function itemLabel()
    {
        return "Сущность без секций";
    }

}