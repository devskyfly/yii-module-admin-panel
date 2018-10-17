<?php
namespace devskyfly\yiiModuleAdminPanel\models\contentPanel;

use yii\db\ActiveRecord;
use devskyfly\php56\core\Cls;
use devskyfly\php56\types\Obj;
use yii\helpers\ArrayHelper;

/**
 * 
 * @author devskyfly
 * @property string $item_table
 * @property string $__id
 */
abstract class AbstractItemExtension extends ActiveRecord
{
    /**
     * Return class name
     *
     * @return string
     */
    abstract protected static function itemCls();
    
    /**
     * Return related class name
     */
    public static function getItemCls()
    {
        $cls=static::itemCls();
        if(!Cls::isSubClassOf($cls, AbstractItem::class)){
            throw new \InvalidArgumentException('$cls is not '.AbstractItem::class.' class.');
        }
        return $cls;
    }
    
    /**
     * Init extension by its related item
     * 
     * @param \devskyfly\yiiModuleAdminPanel\models\contentPanel\AbstractItem $item
     * @throws \InvalidArgumentException
     * @throws \LogicException
     * @return \devskyfly\yiiModuleAdminPanel\models\contentPanel\AbstractItemExtension
     */
    public function initByItem($item)
    {
        $cls=static::getItemCls();
        
        if(!Obj::isA($item, $cls)){
            throw new \InvalidArgumentException('Param $item is not '.$cls.' type.');
        }
        
        if($item->isNewRecord){
            throw new \LogicException('Param $item is not save.');
        }
        
        $this->__id=$item->id;
        $this->item_table=$item::shortTableName();
        return $this;
    }

    /**
     * Find extension record using its item id and table name
     * 
     * @param \devskyfly\yiiModuleAdminPanel\models\contentPanel\AbstractItem $item
     * @throws \InvalidArgumentException
     * @throws \LogicException
     * @return null|\devskyfly\yiiModuleAdminPanel\models\contentPanel\AbstractExtension
     */
    public static function findByItem($item)
    {
        $cls=static::getItemCls();
        
        if(!Obj::isA($item, $cls)){
            throw new \InvalidArgumentException('Param $item is not '.$cls.' type.');
        }
        
        if($item->isNewRecord){
            throw new \LogicException('Param $item is not save.');
        }
        
        return static::find()->where(['item_table'=>$item::shortTableName(),'__id'=>$item->id])->one();
    }
    
    /**********************************************************************/
    /** REDECLARATE **/
    /**********************************************************************/
    
    /**
     * 
     * {@inheritDoc}
     * @see \yii\base\Model::rules()
     */
    public function rules()
    {
        $rules=parent::rules();
        $new_rules=[
            [["item_table","__id"],"required"]           
        ];
        $rules=ArrayHelper::merge($rules, $new_rules);
        return $rules;
    }
    
}