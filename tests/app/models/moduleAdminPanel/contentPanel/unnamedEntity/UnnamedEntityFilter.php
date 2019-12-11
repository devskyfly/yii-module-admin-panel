<?php
namespace app\models\moduleAdminPanel\contentPanel\unnamedEntity;

use devskyfly\yiiModuleAdminPanel\models\contentPanel\FilterInterface;
use devskyfly\yiiModuleAdminPanel\models\contentPanel\FilterTrait;

class UnnamedEntityFilter extends UnnamedEntity implements FilterInterface
{
    use FilterTrait;
    
    public function rules()
    {
        return [[["data","active"],"string"]];
    }
}