<?php
namespace app\models\moduleAdminPanel\contentPanel\unnamedEntity;

use devskyfly\yiiModuleAdminPanel\models\contentPanel\AbstractUnnamedEntity;
use yii\helpers\ArrayHelper;

class UnnamedEntity extends AbstractUnnamedEntity
{
    /**
     * 
     * @return NULL
     */
    protected static function sectionCls()
    {
        return null;
    }
    
    /**
     * 
     * {@inheritDoc}
     * @see \devskyfly\yiiModuleAdminPanel\models\contentPanel\AbstractUnnamedEntity::rules()
     */
    public function rules()
    {
        $rules=parent::rules();
        $new_rules=[
            [["data"],"string"]
        ];
        $rules=ArrayHelper::merge($rules,$new_rules);
        return $rules;
    }
}