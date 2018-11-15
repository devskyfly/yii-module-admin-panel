<?php
namespace devskyfly\yiiModuleAdminPanel\console\search;

use yii\helpers\BaseConsole;
use yii\console\Controller;
use devskyfly\yiiModuleAdminPanel\models\search\Indexer;
use devskyfly\yiiModuleAdminPanel\models\search\ElasticProvider;

class IndexerController extends Controller
{
    /**
     * 
     * @var \devskyfly\yiiModuleAdminPanel\models\search\Service
     */
    protected $service=null;
    
    public function init()
    {
        parent::init();
        $this->elastic_provider=new ElasticProvider();
    }
    
    public function actionUpdateIndex()
    {
        try{
            $indexer=new Indexer();
            $indexer->index();
        }catch (\Exception $e){
            BaseConsole::stdout($e->getMessage().PHP_EOL.$e->getTraceAsString());
             return -1;
        }catch (\Throwable $e){
            BaseConsole::stdout($e->getMessage().PHP_EOL.$e->getTraceAsString());
            return -1;
        }
        return 0;
    }
    
    public function actionDropIndex()
    {
        try{
            $response=$this->service->dropIndex();
            BaseConsole::stdout(print_r($response,true).PHP_EOL);
        }catch (\Exception $e){
            BaseConsole::stdout($e->getMessage().PHP_EOL.$e->getTraceAsString());
            return -1;
        }catch (\Throwable $e){
            BaseConsole::stdout($e->getMessage().PHP_EOL.$e->getTraceAsString());
            return -1;
        }
        return 0;
    }
    
    public function actionCreateIndex()
    {
        try{
            $response=$this->elastic_provider->createIndex();
            BaseConsole::stdout(print_r($response,true).PHP_EOL);
        }catch (\Exception $e){
            BaseConsole::stdout($e->getMessage().PHP_EOL.$e->getTraceAsString());
            return -1;
        }catch (\Throwable $e){
            BaseConsole::stdout($e->getMessage().PHP_EOL.$e->getTraceAsString());
            return -1;
        }
        return 0;
    }
    
    public function actionSearch()
    {
        try{
            $str=BaseConsole::prompt('Insert search request:');
            $response=$this->elastic_provider->search($str);
            BaseConsole::stdout(print_r($response,true).PHP_EOL);
        }catch (\Exception $e){
            BaseConsole::stdout($e->getMessage().PHP_EOL.$e->getTraceAsString());
            return -1;
        }catch (\Throwable $e){
            BaseConsole::stdout($e->getMessage().PHP_EOL.$e->getTraceAsString());
            return -1;
        }
        return 0;
    }
}

