<?php
use devskyfly\yiiModuleAdminPanel\migrations\helpers\contentPanel\SectionMigrationHelper;

/**
 * Class m180921_134812_init_section_table
 */
class m180921_134812_init_section_table extends SectionMigrationHelper
{
    public $table="section";
    
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
        echo "m180921_134812_init_section_table cannot be reverted.\n";
        $this->dropTable($this->table);
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180921_134812_init_section_table cannot be reverted.\n";

        return false;
    }
    */
}
