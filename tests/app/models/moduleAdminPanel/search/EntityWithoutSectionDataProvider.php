<?php
namespace app\models\moduleAdminPanel\search;

use devskyfly\yiiModuleAdminPanel\models\search\AbstractDataProvider;

class EntityWithoutSectionDataProvider extends AbstractDataProvider
{
    public $item;
    
    protected function params()
    {
       $item=$this->item;
       return [
           'id'=>$item::tableName().'_'.$this->item->id,
           'name'=>$this->item->name,
           'content'=>$this->item->extensions['page']->detail_text,
           'route'=>sprintf('["moduleAdminPanel/contentPanel/entity-without-section/entity-edit","entity_id"=>%s]',$this->item->id)
        ];
    }
}

