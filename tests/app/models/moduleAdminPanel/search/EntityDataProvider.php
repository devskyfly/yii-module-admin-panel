<?php
namespace app\models\moduleAdminPanel\search;

use devskyfly\libs\convertors\fileToText\ConvertorFactory;
use devskyfly\yiiModuleAdminPanel\models\search\AbstractDataProvider;
use Yii;
use yii\helpers\BaseConsole;

class EntityDataProvider extends AbstractDataProvider
{
    public $item;
    
    protected function params()
    {
       $item=$this->item;
       $file=$item->extensions['file'];
       
       $path=Yii::getAlias($file->path);
       $convertor=ConvertorFactory::create($path);
       $content=$convertor->convert();
       BaseConsole::stdout($content);
       
       return [
           'id'=>$item::tableName().'_'.$this->item->id,
           'name'=>$this->item->name,
           'content'=>$content,
           'route'=>sprintf('["moduleAdminPanel/contentPanel/entity-with-section/entity-edit","entity_id"=>%s]',$this->item->id)
        ];
    }
}

