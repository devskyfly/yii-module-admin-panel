<?php

use devskyfly\yiiModuleAdminPanel\migrations\helpers\contentPanel\FileMigrationHelper;
use yii\db\Migration;

/**
 * Class m181025_065406_init_file_table
 */
class m181025_065406_init_file_table extends FileMigrationHelper
{
    public $table='file';
    
    /**
     * {@inheritdoc}
     */
    public function up()
    {
        $this->createTable($this->table, $this->getFieldsDefinition());
    }

    /**
     * {@inheritdoc}
     */
    public function down()
    {
        echo "m181025_065406_init_file_table cannot be reverted.\n";
        $this->dropTable($this->table);
        //return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m181025_065406_init_file_table cannot be reverted.\n";

        return false;
    }
    */
}
