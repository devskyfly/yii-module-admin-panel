<?php
namespace devskyfly\yiiModuleAdminPanel\models\contentPanel;

use yii\db\ActiveRecord;
use devskyfly\php56\core\Cls;
use devskyfly\php56\types\Nmbr;

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
    /**
     * @return string - Class name
     */
    abstract protected static function masterCls();
    
    /**
     * Return master class name
     */
    public static function getMasterCls()
    {
        $cls=static::masterCls();
        
        if(!Cls::isSubClassOf($cls, AbstractItem::class)){
            throw new \BadMethodCallException("Method masterCls() return not subclass of ".AbstractItem::class.".");
        };
        
        return $cls;
    }
    
    /**
     * @return string - Class name
     */
    abstract protected function slaveCls();
    
    /**
     * Return slave class name
     */
    public static function getSlaveCls()
    {
        $cls=static::slaveCls();
        
        if(!Cls::isSubClassOf($cls, AbstractItem::class)){
            throw new \BadMethodCallException("Method slaveCls() return not subclass of ".AbstractItem::class.".");
        };
        
        return $cls;
    }
    
    /**
     *
     * @param int $master_id
     * @return int[]
     */
    public static function getSlaveIds($master_id)
    {
        $master_id=Nmbr::toIntegerStrict($master_id);
        $result=static::find()->andWhere(['master_id'=>$master])->asArray()->all();
        return array_column($result, 'id');
    }
    
    /**
     *
     * @param int $master_id
     * @return AbstractItem[]
     */
    public static function getSlaveItems($master_id)
    {
        $slave_cls=static::getSlaveCls();
        $ids=static::getSlaveIds($master_id);
        $slave_cls::find()->where(['id'=>$ids])->all();
    }
    
    /**
     *
     * @param int $master_id
     * @return int
     */
    public static function deleteSlaveItems($master_id)
    {
        $slave_cls=static::getSlaveCls();
        $ids=static::getSlaveIds($master_id);
        return $slave_cls::deleteAll(['name'=>static::class,'id'=>$ids]);
    }
    
    /**********************************************************************/
    /** Redeclaration **/
    /**********************************************************************/
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
    
    public static function find()
    {
        return static::find()->where(['name'=>static::class]);
    }
}

