<?php
namespace devskyfly\yiiModuleAdminPanel\models\search\data;

use devskyfly\php56\types\Str;
use yii\base\BaseObject;
use phpDocumentor\Reflection\Types\This;

abstract class AbstractDataProvider extends BaseObject
{
    protected $param_fields=[
        'id',
        'type',
        'name',
        'content',
        'route'
    ];
    
    /**
     * Params for adding in elasticsearch document
     * @var array
     */
    protected $params=[];
    
    public function init()
    {
        parent::init();
        $this->formParams();
        $this->checkParams();
    }
    
   
    protected function formParams()
    {
        $this->params();   
        return $this;
    }
    
    
    /**
     * This methode realize logic of params forming.
     *
     * @return \devskyfly\yiiModuleAdminPanel\models\search\data\AbstractDataProvider
     */
    abstract protected function params();

    /**
     * 
     * @throws \InvalidArgumentException
     * @return \devskyfly\yiiModuleAdminPanel\models\search\data\AbstractDataProvider
     */
    protected function checkParams()
    {
        foreach ($param_fields as $param_fields_item){
            if(!Str::isString($this->params['$param_fields_item'])){
                throw new \InvalidArgumentException('Property $params['.$param_fields_item.'] is not string type');
            }
        }
        return $this;
    }
    
    public function getParams()
    {
       return $this->params;
    }
}