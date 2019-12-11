<?php
namespace app\models\moduleAdminPanel\contentPanel\entityWithSection;

use devskyfly\yiiModuleAdminPanel\models\contentPanel\AbstractEntity;
use yii\helpers\ArrayHelper;

class Entity extends AbstractEntity
{
    /**
     * File extension
     * @var file
     */
    public $file;
    /**
     * 
     * {@inheritDoc}
     * @see \devskyfly\yiiModuleContentPanel\models\contentPanel\AbstractSection::section()
     */
    public static function sectionCls()
    {
        return Section::class;
    }
    
    /**
     *
     * {@inheritDoc}
     * @see \devskyfly\yiiModuleContentPanel\models\contentPanel\AbstractItem::extensions()
     */
    public function extensions()
    {
         return [
            'file'=>EntityFileExtension::class,
            'page'=>EntityPageExtension::class
        ];
    }
    
    /**
     *
     * {@inheritDoc}
     * @see \devskyfly\yiiModuleContentPanel\models\contentPanel\AbstractItem::binders()
     */
    public function binders()
    {
        return [
            "entity_to_entity"=>EntityToEntityBinder::class
        ];
    }

    public function rules()
    {
        $rules=parent::rules();

        $new_rules=[
            [['file'],'file','skipOnEmpty'=>true,'extensions'=>'png, jpg, pdf, docx, xlsx']
        ];
        
        $rules=ArrayHelper::merge($rules, $new_rules);
        return $rules;
    }
    
    public static function selectListRoute()
    {
        return "moduleAdminPanel/contentPanel/entity-with-section/entity-select-list";
    }
    
}