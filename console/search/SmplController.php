<?php
namespace devskyfly\yiiModuleAdminPanel\console\search;

use devskyfly\php56\types\Vrbl;
use Yii;
use yii\console\Controller;
use yii\helpers\BaseConsole;
use yii\helpers\Json;
use yii\httpclient\Client;
use Elasticsearch\ClientBuilder;
//use Elasticsearch\Client;

class SmplController extends Controller
{
    public $module=null;
    public $hosts=[];
    public $client=null;
    
    public function init()
    {
        $this->module=Yii::$app->getModule("admin-panel");
        if(Vrbl::isNull($this->module)){
           throw new \InvalidArgumentException('Property $module is null.');
        }
        $this->hosts[]=$this->module->getElasticSearchAddress();
        $this->client=ClientBuilder::create()
        ->setHosts($this->hosts)
        ->setConnectionParams([
             'client'=>[
                 'curl'=>[
                     CURLOPT_PROXY=>'',
                     CURLOPT_HTTPPROXYTUNNEL=>false
                 ]
             ]   
        ])
        ->build();
    }
    
    public function actionIndex()
    {
        try{
            $client=new Client();
            $request=$client->createRequest();
            $request->setMethod('GET')           
            ->setUrl($this->module->getElasticSearchAddress());
            $response=$request->send();
            BaseConsole::stdout(print_r($response->getData(),true));
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
            $index_name="partners_iitrust_ru";

            $params=[
                'index'=>$index_name
            ];
            
            $response=$this->client->indices()->create($params);
            
            BaseConsole::stdout(print_r($response,true));
        }catch (\Exception $e){
            BaseConsole::stdout($e->getMessage().PHP_EOL.$e->getTraceAsString());
            return -1;
        }catch (\Throwable $e){
            BaseConsole::stdout($e->getMessage().PHP_EOL.$e->getTraceAsString());
            return -1;
        }
        return 0;
    }
    
    public function actionCreateType()
    {
        try{
            $index_name="partners_iitrust_ru";

            for ($i=1;$i<=10;$i++){
                $params=[
                    
                    "index"=>$index_name,
                    "type"=>"file",
                    "id"=>"_".$i,
                    "body"=>[
                        "name"=>"manual_{$i}.pdf",
                        "url"=>"files/id/_{$i}",
                    ]
                ];
                $response=$this->client->index($params);
                BaseConsole::stdout(print_r($response,true).PHP_EOL);
            }
        }catch (\Exception $e){
            BaseConsole::stdout($e->getMessage().PHP_EOL.$e->getTraceAsString());
            return -1;
        }catch (\Throwable $e){
            BaseConsole::stdout($e->getMessage().PHP_EOL.$e->getTraceAsString());
            return -1;
        }
        return 0;
    }
    
    public function actionDeleteIndex()
    {
        try{
            $index_name="partners_iitrust_ru";
            $response=$this->client
            ->indices()
            ->delete(['index'=>$index_name]);
            BaseConsole::stdout(print_r($response,true));
        }catch (\Exception $e){
            BaseConsole::stdout($e->getMessage().PHP_EOL.$e->getTraceAsString());
             return -1;
        }catch (\Throwable $e){
            BaseConsole::stdout($e->getMessage().PHP_EOL.$e->getTraceAsString());
            return -1;
        }
        return 0;
    }
    
    public function actionGetDocument()
    {
        try{
            $index_name="partners_iitrust_ru";
            
            
            $params=[
                "index"=>$index_name,
                "type"=>"file",
                "id"=>1,
            ];
            $response=$this->client->get($params);
            BaseConsole::stdout(print_r($response,true));
        }catch (\Exception $e){
            BaseConsole::stdout($e->getMessage().PHP_EOL.$e->getTraceAsString());
            return -1;
        }catch (\Throwable $e){
            BaseConsole::stdout($e->getMessage().PHP_EOL.$e->getTraceAsString());
            return -1;
        }
        return 0;
    }
    
    public function actionSearchDocument()
    {
        try{
            $index_name="partners_iitrust_ru";
            
            $params=[
                'index'=>$index_name,
                'type'=>'file',
                'body'=>[
                    'query'=> [
                        'match'=> [
                            'name'=>'manual1.pdf'
                        ]
                    ]
                ]
            ];
            $response=$this->client->search($params);
            
            BaseConsole::stdout(print_r($response,true));
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