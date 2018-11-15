<?php
namespace devskyfly\yiiModuleAdminPanel\models\search;

use devskyfly\php56\types\Vrbl;
use Yii;
use yii\base\BaseObject;

class Indexer extends BaseObject
{
    
    protected $service=null;
    
    public function init()
    {
        parent:init();
        $this->service=new Service();
    }
    
    public function index()
    {
        
    }
}