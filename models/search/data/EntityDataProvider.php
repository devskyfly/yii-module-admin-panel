<?php
namespace devskyfly\yiiModuleAdminPanel\models\search\data;

class EntityDataProvider extends AbstractDataProvider
{
    public $item;
    
    protected function params()
    {
       return [
           'id'=>''.$this->item->id,
           'name'=>$this->item->name,
           'content'=>$this->item->extensions['page']->detail_text
        ];
    }
}

