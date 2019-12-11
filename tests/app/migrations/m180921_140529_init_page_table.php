<?php
use devskyfly\yiiModuleAdminPanel\migrations\helpers\contentPanel\PageMigrationHelper;

/**
 * Class m180921_140529_init_page_table
 */
class m180921_140529_init_page_table extends PageMigrationHelper
{
    
    public $table="page";
    
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
        echo "m180921_140529_init_page_table cannot be reverted.\n";
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
        echo "m180921_140529_init_page_table cannot be reverted.\n";

        return false;
    }
    */
}
