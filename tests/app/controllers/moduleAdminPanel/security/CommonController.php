<?php
namespace app\controllers\moduleAdminPanel\security;

use yii\web\Controller;
use devskyfly\yiiModuleAdminPanel\filters\security\IpBlackListFilter;
use yii\web\ForbiddenHttpException;
use yii\web\HttpException;
use yii\web\ForbiddenHttpException as YiiForbiddenHttpException;
use devskyfly\yiiModuleAdminPanel\models\security\IpBlackList;
use devskyfly\php56\types\Vrbl;

class CommonController extends Controller
{
    public function behaviors()
    {
        return [
            [
                'class'=>IpBlackListFilter::class,
                'only'=>['index']
            ]
        ];    
    }
    
    public function actionIndex()
    {
        return $this->render('index');
    }
}