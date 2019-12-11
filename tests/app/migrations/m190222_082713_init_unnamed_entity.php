<?php

use devskyfly\yiiModuleAdminPanel\migrations\helpers\contentPanel\UnnamedEntityMigrationHelper;
use yii\helpers\ArrayHelper;

/**
 * Class m190222_082713_init_unnamed_entity
 */
class m190222_082713_init_unnamed_entity extends UnnamedEntityMigrationHelper
{
    public $table="unnamed_entity";
    
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $fields=$this->getFieldsDefinition();
        $additional_fields=['data'=>$this->text()];
        $fields=ArrayHelper::merge($fields,$additional_fields);
        $this->createTable($this->table, $fields);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        //echo "m190222_082713_init_unnamed_entity cannot be reverted.\n";
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
        echo "m190222_082713_init_unnamed_entity cannot be reverted.\n";

        return false;
    }
    */
}
