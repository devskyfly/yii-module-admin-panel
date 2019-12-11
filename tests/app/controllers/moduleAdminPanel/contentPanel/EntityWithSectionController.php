<?php
namespace app\controllers\moduleAdminPanel\contentPanel;

use Yii;
//use yii\filters\AccessControl;

use devskyfly\yiiModuleAdminPanel\controllers\contentPanel\AbstractContentPanelController;
use devskyfly\yiiModuleAdminPanel\widgets\contentPanel\FileUpload;
use devskyfly\yiiModuleAdminPanel\widgets\contentPanel\ItemSelector;
use app\models\moduleAdminPanel\contentPanel\entityWithSection\Entity;
use app\models\moduleAdminPanel\contentPanel\entityWithSection\EntityToEntityBinder;
use app\models\moduleAdminPanel\contentPanel\entityWithSection\Section;
use devskyfly\php56\types\Obj;
use devskyfly\yiiModuleAdminPanel\widgets\contentPanel\Binder;

class EntityWithSectionController extends AbstractContentPanelController
{
    /**
     * 
     * {@inheritDoc}
     * @see \devskyfly\yiiModuleAdminPanel\controllers\AbstractContentPanelController::sectionItem()
     */
    public static function sectionCls()
    {
        return Section::class;
    }
    
    /**
     * 
     * {@inheritDoc}
     * @see \devskyfly\yiiModuleAdminPanel\controllers\AbstractContentPanelController::entityItem()
     */
    public static function entityCls()
    {
        return Entity::class;
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
                    .ItemSelector::widget([
                        "form"=>$form,
                        "master_item"=>$item,
                        "slave_item_cls"=>$item::sectionCls(),
                        "property"=>"_section__id"
                    ])
                    .Binder::widget([
                        "label"=>"Связь",
                        "form"=>$form,
                        "master_item"=>$item,
                        "binder_cls"=>EntityToEntityBinder::class
                    ])
                    .$form->field($item,'code')
                    .$form->field($item,'create_date_time')
                    .$form->field($item,'change_date_time')
                    .$form->field($item,'active')->checkbox(['value'=>'Y','uncheckValue'=>'N','checked'=>$item->active=='Y'?true:false])
                    .FileUpload::widget([
                        "form"=>$form,
                        "item"=>$item,
                        "attribute"=>'file'
                    ])
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
        return function($form,$item)
        {
            
             return [
                [
                    "label"=>"main",
                    "content"=>
                    $form->field($item,'name')
                    .ItemSelector::widget([
                        "form"=>$form,
                        "master_item"=>$item,
                        "slave_item_cls"=>Obj::getClassName($item),
                        "property"=>"__id"
                    ])
                    .$form->field($item,'code')
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
     * @see \devskyfly\yiiModuleAdminPanel\controllers\AbstractContentPanelController::itemLabel()
     */
    public function itemLabel()
    {
        return "Сущность с секцией";
    }

}