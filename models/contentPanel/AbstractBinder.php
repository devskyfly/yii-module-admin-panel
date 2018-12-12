<?php
namespace devskyfly\yiiModuleAdminPanel\models\contentPanel;

use yii\db\ActiveRecord;

/**
 * Give opportunity to bind entity to other entities using relation one to many.
 * 
 * @author devskyfly
 * @param $name
 * @param $master_id
 * @param $slave_id
 */
abstract class AbstractBinder extends ActiveRecord
{
    public function init()
    {
        parent::init();
        $this->name=static::class;
    }
    
    public function rules()
    {
        $rules=parent::rules();
        
        $new_rules=[
            [['name','master_id','slave_id'],'required'],
            [['master_id','slave_id'],'string']
        ];
    }
}

