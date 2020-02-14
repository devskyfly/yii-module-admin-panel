<?php
namespace app\models\entity;

use devskyfly\yiiModuleAdminPanel\models\contentPanel\FilterInterface;
use devskyfly\yiiModuleAdminPanel\models\contentPanel\FilterTrait;

class EntityFilter extends Entity implements FilterInterface
{
    use FilterTrait;
    
    public function rules()
    {
        return [[["active"],"string"]];
    }
}