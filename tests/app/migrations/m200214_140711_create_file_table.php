<?php

use devskyfly\yiiModuleAdminPanel\migrations\helpers\contentPanel\FileMigrationHelper;

/**
 * Handles the creation of table `{{%file}}`.
 */
class m200214_140711_create_file_table extends FileMigrationHelper
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $fields = $this->getFieldsDefinition();
        $this->createTable('{{%file}}', $fields);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%file}}');
    }
}
