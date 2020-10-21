<?php
namespace app\models\entity;

use devskyfly\yiiModuleAdminPanel\models\contentPanel\AbstractEntity;
use yii\helpers\ArrayHelper;

class Entity extends AbstractEntity
{
    public $file;
    
    public function rules()
    {
        $rules = parent::rules();

        $new_rules = [
            [['file'], 'file', 'skipOnEmpty'=>true, 'extensions'=>'png,jpg']
        ];
        
        $rules = ArrayHelper::merge($rules, $new_rules);
        return $rules;
    }

    public static function sectionCls()
    {
        return Section::class;
    }
    
    public function extensions()
    {
        return [
            'file' => FileExtension::class
        ];
    }

    public function binders(){
        return [];
        /*return [
            'EntityToSubEntityBinder'=>EntityToSubEntityBinder::class,
        ];*/
    }
    
    public static function selectListRoute()
    {
        return "/entity/section-select-list";
    }
}