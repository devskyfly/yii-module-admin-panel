<?php
namespace app\controllers\moduleAdminPanel\search;

use yii\web\Controller;
use devskyfly\php56\types\Vrbl;
use devskyfly\yiiModuleAdminPanel\models\search\ElasticSearchActiveRecord;

class QueryController extends Controller
{
    public function actionIndex($query=null)
    {
        if(Vrbl::isNull($query)){
            $query="";
        }
        return $this->render('index',compact("query"));
    }
}

