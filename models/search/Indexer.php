<?php
namespace devskyfly\yiiModuleAdminPanel\models\search;

use devskyfly\php56\types\Obj;
use devskyfly\php56\types\Vrbl;
use yii\base\BaseObject;
use yii\helpers\BaseConsole;

class Indexer extends BaseObject
{
    
    protected $elastic_provider=null;
    
    public function init()
    {
        parent::init();
        $this->elastic_provider=new ElasticProvider();
    }
    
    public function index($handler)
    {
        if(!Vrbl::isCallable($handler)){
            throw new \InvalidArgumentException('Param $callable is not callable type.');
        }
        
        foreach ($handler() as $item)
        {
            BaseConsole::stdout($item::className().PHP_EOL);
            BaseConsole::stdout(AbstractDataProvider::class.PHP_EOL);
            
            if(!Obj::isA($item, AbstractDataProvider::class));
            {               
                throw new \InvalidArgumentException('Variable $item is not '.AbstractDataProvider::class.' type.');
            }
            $this->elastic_provider->saveDocumentItem($item);
        }
    }
        
}