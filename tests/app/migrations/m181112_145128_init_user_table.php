<?php

/**
 * Class m181112_145128_init_user_table
 */
use devskyfly\yiiModuleAdminPanel\migrations\helpers\contentPanel\UserMigrationHelper;

class m181112_145128_init_user_table extends UserMigrationHelper
{
    public $table='user';
    
    public function up()
    {
        $this->createTable($this->table, $this->getFieldsDefinition());
    }

    /**
     * {@inheritdoc}
     */
    public function down()
    {
        $this->dropTable($this->table);
        return true;
    }

    
}
