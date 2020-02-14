<?php

namespace app\controllers;

use app\models\entity\Entity;
use app\models\entity\EntityFilter;
use app\models\entity\Section;
use devskyfly\php56\types\Obj;
use devskyfly\yiiModuleAdminPanel\controllers\contentPanel\AbstractContentPanelController;
use devskyfly\yiiModuleAdminPanel\widgets\contentPanel\ItemSelector;

class EntityController extends AbstractContentPanelController
{
   //Classes

   public static function sectionCls()
   {
       return Section::class;
   }
   
   
   public static function entityCls()
   {
       return Entity::class;
   }
   
   public static function entityFilterCls()
   {
       return EntityFilter::class;
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
                   $form->field($item, 'name')
                   .ItemSelector::widget([
                       "form" => $form,
                       "master_item" => $item,
                       "slave_item_cls" => $item::sectionCls(),
                       "property" => "_section__id"
                   ])
                   .$form->field($item, 'create_date_time')
                   .$form->field($item, 'change_date_time')
                   .$form->field($item,'active')->checkbox([
                       'value'=>'Y', 
                       'uncheck'=>'N', 
                       'checked'=>$item->active=='Y'?true:false])
               ],
               /*[
                   "label" => "seo",
                   "content" => $form->field($item->extensions['page'], 'title')
                   .$form->field($item->extensions['page'], 'keywords')
                   .$form->field($item->extensions['page'], 'description')
                   .$form->field($item->extensions['page'], 'preview_text')
                   .$form->field($item->extensions['page'], 'detail_text')
               ]*/
           ];
       };
   }
   
   public function sectionEditorViews()
   {
       return function($form, $item)
       {
            return [
               [
                   "label" => "main",
                   "content" =>
                   $form->field($item,'name')
                   .ItemSelector::widget([
                       "form" => $form,
                       "master_item" => $item,
                       "slave_item_cls" => Obj::getClassName($item),
                       "property" => "__id"
                   ])
                   .$form->field($item, 'create_date_time')
                   .$form->field($item, 'change_date_time')
                   .$form->field($item,'active')->checkbox([
                       'value'=>'Y', 
                       'uncheck'=>'N', 
                       'checked'=>$item->active=='Y'?true:false
                    ])
               ],
               /*[
                   "label" => "seo",
                   "content" => $form->field($item->extensions['page'],'title')
                   .$form->field($item->extensions['page'], 'keywords')
                   .$form->field($item->extensions['page'], 'description')
                   .$form->field($item->extensions['page'], 'preview_text')
                   .$form->field($item->extensions['page'], 'detail_text')
               ]*/
           ];
       };
   }
   
   //Title
   public function itemLabel()
   {
       return "Сущность с секцией";
   }
}