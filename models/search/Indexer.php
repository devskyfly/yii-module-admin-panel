<?php
namespace devskyfly\yiiModuleAdminPanel\models\search;

use devskyfly\php56\types\Obj;
use yii\base\BaseObject;
use devskyfly\yiiModuleAdminPanel\models\search\data\EntityDataProvider;
use devskyfly\yiiModuleAdminPanel\models\search\data\AbstractDataProvider;
use app\models\moduleAdminPanel\contentPanel\entityWithoutSection\EntityWithoutSection;
use yii\helpers\BaseConsole;

class Indexer extends BaseObject
{
    
    protected $service=null;
    
    public function init()
    {
        parent::init();
        $this->elastic_provider=new ElasticProvider();
    }
    
    public function index()
    {
        foreach ($this->indexItemGenerator() as $item)
        {
            BaseConsole::stdout($item::className().PHP_EOL);
            if(!Obj::isA($item, AbstractDataProvider::class));
            {
               
                //throw new \InvalidArgumentException('Variable $item is not '.AbstractDataProvider::class.' type.');
            }
            $this->elastic_provider->saveDocumentItem($item);
        }
    }
        
    protected function indexItemGenerator()
    {
        $query=EntityWithoutSection::find()->where(['active'=>'Y']);
        foreach ($query->each(10) as $item){
            BaseConsole::stdout($item->id.' - '.$item->name.PHP_EOL);
            yield new EntityDataProvider(['item'=>$item]);
        }
    }
}