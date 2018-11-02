<?php
namespace devskyfly\yiiModuleAdminPanel\tools;
use Yii;
use yii\base\BaseObject;
use yii\db\Migration;

class Db extends BaseObject
{
    public static function truncateDateBase()
    {
        $excluded_tables=['migration','user'];
        $db=Yii::$app->db;
        $schema=$db->schema;
        $tables=$schema->getTableNames();
        
        $migration=new Migration();
        foreach ($tables as $table){
            if(!in_array($table, $haystack)){
                $migration->truncateTable($table);
            }
        }
    }
}