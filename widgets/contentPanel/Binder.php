<?php
namespace devskyfly\yiiModuleAdminPanel\widgets\contentPanel;

use yii\base\Widget;
use devskyfly\php56\core\Cls;
use devskyfly\yiiModuleAdminPanel\models\contentPanel\AbstractBinder;
use devskyfly\yiiModuleAdminPanel\models\contentPanel\AbstractItem;
use devskyfly\php56\types\Nmbr;
use devskyfly\php56\types\Obj;
use devskyfly\php56\types\Vrbl;
use yii\widgets\ActiveForm;

class Binder extends Widget
{
    /**
     * 
     * @var \yii\widgets\ActiveForm
     */
    public $form=null;
    
    /**
     * Master item instance
     * 
     * @var devskyfly\yiiModuleAdminPanel\models\contentPanel\AbstractItem
     */
    public $master_item=null;
    
    /**
     * Binder class
     * 
     * @var devskyfly\yiiModuleAdminPanel\models\contentPanel\AbstractBinder
     */
    public $binder_cls;
    
    /**
     * 
     * @var devskyfly\yiiModuleAdminPanel\models\contentPanel\AbstractBinder[]
     */
    protected $binder_list=[];
    
    /**
     *
     * @var devskyfly\yiiModuleAdminPanel\models\contentPanel\AbstractItem[]
     */
    protected $slave_items=[];
    
    public function init()
    {
        if(!Obj::isA($this->form, ActiveForm::class)){
            throw new \InvalidArgumentException('Property $item is not '.ActiveForm::class.' type.');
        }
        
        if(!Obj::isA($this->master_item, AbstractItem::class)){
            throw new \InvalidArgumentException('Property $master_item is not '.AbstractItem::class.' type.');
        }
        
        if(!Cls::isSubClassOf($this->binder_cls, AbstractBinder::class)){
            throw new \InvalidArgumentException('Property $binder_cls is not sub class of '.AbstractBinder::class.'.');
        }
        $slave_cls=$binder_cls::getSlaveCls();
        $binder_cls=$this->binder_cls;
        $binder_list=$binder_cls::getRowsByMasterItem($this->master_item);
        
        foreach ($binder_list as $binder){
            $slave_id=$binder->slave_id;
            $slave_item=$slave_cls::find()->where(['id'=>$binder->slave])->one();
            if(Vrbl::isNull($slave_item)){
                $this->slave_items[]="";
            }else{
                $this->slave_items[]=$slave_item->name;
            }
        }       
    }
    
    public function run()
    {
        $binder_cls=$this->binder_cls;
        $form=$this->form;
        $master_item=$this->master_item;
        $slave_item_cls=$binder_cls::getSlaveCls();
        $slave_items=$this->slave_items;

        return $this->render('item-selector',compact("master_item","slave_items","slave_item_cls","form","binder_cls"));
    }
}