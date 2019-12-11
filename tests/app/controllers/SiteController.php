<?php
namespace app\controllers;

use devskyfly\yiiModuleAdminPanel\actions\auth\LoginAction;
use devskyfly\yiiModuleAdminPanel\actions\auth\LogoutAction;
use yii\web\Controller;

class SiteController extends Controller
{
    public function actions()
    {
        return [
            'login'=>[
                'class'=>LoginAction::class
            ],
            'logout'=>[
                'class'=>LogoutAction::class
            ],
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            
        ];
    }

    public function actionIndex()
    {
        $this->view->title = "Index";

        $this->view->registerMetaTag([
            'name' => 'description',
            'content' => 'index description'
        ]);
        $this->view->registerMetaTag([
            'name' => 'keywords',
            'content' => 'index keywords'
        ]);
        
        return $this->render("index");
    }
}