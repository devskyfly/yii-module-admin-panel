<?php
use devskyfly\yiiModuleAdminPanel\migrations\helpers\contentPanel\EntityMigrationHelper;


/**
 * Class m181016_105648_init_entity_without_section
 */
class m181016_105648_init_entity_without_section extends EntityMigrationHelper
{
    public $table="entity_without_section";
    
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
        //echo "m181016_105648_init_entity_without_section cannot be reverted.\n";
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
        echo "m181016_105648_init_entity_without_section cannot be reverted.\n";

        return false;
    }
    */
}
