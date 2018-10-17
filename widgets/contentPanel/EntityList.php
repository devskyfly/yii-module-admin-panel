<?php
namespace devskyfly\yiiModuleAdminPanel\widgets\contentPanel;

use yii\base\Widget;
use devskyfly\php56\core\Cls;
use devskyfly\php56\types\Arr;
use devskyfly\php56\types\Nmbr;
use devskyfly\php56\types\Obj;
use devskyfly\php56\types\Vrbl;
use devskyfly\yiiModuleAdminPanel\models\contentPanel\AbstractEntity;
use yii\grid\GridView;
use yii\data\ActiveDataProvider;

class EntityList extends Widget
{
    /**
     *
     * @var \devskyfly\yiiModuleAdminPanel\models\contentPanel\AbstractEntity
     */
    public $entity_cls;
    
    /**
     * @var integer|null
     */
    public $page=null;
    
    /**
     * @var integer|null
     */
    public $parent_section_id=null;
    
    /**
     * @var array
     */
    public $entity_columns=[];
    
    protected $variables=[];
    
    public function init()
    {
        parent::init();
        
        if(!Vrbl::isNull($this->parent_section_id))
        {
            $this->parent_section_id=Nmbr::toIntegerStrict($this->parent_section_id);
            if(!Nmbr::isInteger($this->parent_section_id)){
                throw new \InvalidArgumentException('Property $parent_section_id is not integer type.');
            }
        }
        if(!Vrbl::isNull($this->page))
        {
            if(!Nmbr::isInteger($this->page)){
                throw new \InvalidArgumentException('Property $page is not integer type.');
            }
        }
        if(!Cls::isSubClassOf($this->entity_cls,AbstractEntity::class)){
            throw new \InvalidArgumentException('Property $entity_cls is not '.AbstractEntity::class.' class.');
        }
        if(!Arr::isArray($this->entity_columns)){
            throw new \InvalidArgumentException('Property $page is not array type.');
        }
        
        $parent_section_id=$this->parent_section_id;
        $entity_item=$this->entity_cls;
        $columns=$this->entity_columns;
        $data_provider=new ActiveDataProvider([
            'query'=>$entity_item::find()->where(['_section__id'=>$this->parent_section_id]),
            'pagination'=>[
                'pageSize'=>10,
                'page'=>$this->page-1
            ]
        ]);
        $this->variables=compact("data_provider","columns","parent_section_id");
    }
    
    
    public function run()
    {
        return $this->render('entity-list',$this->variables);
    }
}