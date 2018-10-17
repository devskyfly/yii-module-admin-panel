<?php
namespace devskyfly\yiiModuleAdminPanel\widgets\contentPanel;

use devskyfly\php56\core\Cls;
use devskyfly\php56\types\Arr;
use devskyfly\php56\types\Vrbl;
use devskyfly\php56\types\Nmbr;
use devskyfly\php56\types\Str;
use yii\base\Widget;
use yii\helpers\Url;
use devskyfly\yiiModuleAdminPanel\models\contentPanel\AbstractSection;

use LogicException;
use devskyfly\php56\types\Lgc;

class EntityNavigationLinks extends Widget
{
    public $route="index";
    
    public function run()
    {

        $list=[];


        $list[]=['label'=>"#",'url'=>Url::toRoute([$this->route])];       

        return $this->render('entity-navigation-links',compact("list"));
    }
}