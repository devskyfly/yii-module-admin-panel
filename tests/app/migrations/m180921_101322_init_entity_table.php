<?php
use devskyfly\yiiModuleAdminPanel\migrations\helpers\contentPanel\EntityMigrationHelper;

/**
 * Class m180921_101322_init_entity_table
 */
class m180921_101322_init_entity_table extends EntityMigrationHelper
{
    public $table="entity";
    
    /**
     * {@inheritdoc}
     */
    public function up()
    {
        $this->createTable($this->table, 
            $this->getFieldsDefinition()
        );
    }

    /**
     * {@inheritdoc}
     */
    public function down()
    {
        //echo "m180921_101322_init_entity_table cannot be reverted.\n";
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
        echo "m180921_101322_init_entity_table cannot be reverted.\n";

        return false;
    }
    */
}
