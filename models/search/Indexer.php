<?php
namespace devskyfly\yiiModuleAdminPanel\models\search;

use devskyfly\php56\types\Obj;
use devskyfly\php56\types\Vrbl;
use yii\base\BaseObject;

class Indexer extends BaseObject
{
    
    protected $elastic_provider=null;
    
    public function init()
    {
        parent::init();
        $this->elastic_provider=new ElasticSearchProvider();
    }
    
    public function index($callback)
    {
        if(!Vrbl::isCallable($callback)){
            throw new \InvalidArgumentException('Param $callable is not callable type.');
        }
        
        foreach ($callback() as $item)
        {
            if(!Obj::isSubClassOf($item, AbstractDataProvider::class))
            {               
                throw new \InvalidArgumentException('Variable $item is not '.AbstractDataProvider::class.' type.');
            }
            $this->elastic_provider->saveDocumentItem($item);
        }
    }
        
}