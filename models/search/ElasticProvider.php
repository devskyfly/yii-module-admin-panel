<?php
namespace devskyfly\yiiModuleAdminPanel\models\search;

use devskyfly\php56\types\Arr;
use devskyfly\php56\types\Vrbl;
use devskyfly\yiiModuleAdminPanel\models\search\data\AbstractDataProvider;
use Yii;
use yii\base\BaseObject;
use Elasticsearch\ClientBuilder;

class ElasticProvider extends BaseObject
{
    protected $module=null;
    
    /**
     *
     * @var Elasticsearch\Client;
     */
    private $_client=null;
    private $_elastic_hosts=[];
    private $_index="";
    private $_document="";
    private $_client_settings=[];
    
    public function init()
    {
        parent::init();
        $module=Yii::$app->getModule('admin-panel');
        
        if(Vrbl::isNull($module)){
            throw new \InvalidArgumentException('Property module is null.');
        }
        
        if(!Arr::isArray($module->search_settings['elastic_hosts'])){
            $ar=[];
            $ar[]=$module->search_settings['elastic_hosts'];
            $this->_elastic_hosts=$ar;
        }else{
            $this->_elastic_hosts=$module->search_settings['elastic_hosts'];
        }
        
        $this->_index=$module->search_settings['index'];
        $this->_document=$module->search_settings['document'];
        
        if(isset($module->search_settings['client_settings'])){
            $this->_client_settings=$module->search_settings['client_settings'];
        }
        
        $this->initClient();
    }
    
    protected function initClient()
    {
        $this->_client=ClientBuilder::create()
        ->setHosts($this->_elastic_hosts)
        ->setConnectionParams($this->_client_settings)
        ->build();
    }
    
    /**
     * 
     * @return []
     */
    public function createIndex()
    {
        $params=[
            'index'=>$this->_index
        ];
        
        $response=$this->_client->indices()->create($params);
        return $response;
    }
    
    /**
     *
     * @return []
     */
    public function dropIndex()
    {
        $params=[
            'index'=>$this->_index
        ];
        $response=$this->_client
        ->indices()
        ->delete($params);
        return $response;
    }
    
    /**
     * 
     * @param AbstractDataProvider $item
     * @return []
     */
    public function saveDocumentItem(AbstractDataProvider $item)
    {
        $item_params=$item->getParams();
        $id=$item_params['id'];
        unset($item_params['id']);
        
        $params=[
            "index"=>$this->_index,
            "type"=>$this->_document,
            "id"=>$id,
            "body"=>$item_params
        ];
        $response=$this->client->index($params);
        return $response;
    }
    
    /**
     * 
     * @param string $str
     * @return []
     */
    public function search($str)
    {
        $params=[
            'index'=>$this->_index,
            'body'=>[
                'query'=> [
                    'match'=> [
                        'name'=>$str
                    ]
                ]
            ]
        ];
         $response=$this->_client->search($params);
         return $response;
    }
    
   /*  public function createDocument()
    {
        
    }
    
    public function dropDocument()
    {
        
    } */
    
    /**********************************************************************/
    /** Getters **/
    /**********************************************************************/
    
    /**
     *
     * @return string[]
     */
    public function getElasticHosts()
    {
        return $this->_elastic_hosts;
    }
    
    /**
     *
     * @return string
     */
    public function getIndex()
    {
        return $this->_index;
    }
    
    /**
     *
     * @return string
     */
    public function getDocument()
    {
        return $this->_document;
    }
    
    /**
     * 
     * @return \devskyfly\yiiModuleAdminPanel\models\search\Elasticsearch\Client;
     */
    public function getClient()
    {
        return $this->_client;
    }
}

