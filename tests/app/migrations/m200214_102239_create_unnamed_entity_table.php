<?php

use devskyfly\yiiModuleAdminPanel\migrations\helpers\contentPanel\UnnamedEntityMigrationHelper;

/**
 * Handles the creation of table `{{%unnamed_entity}}`.
 */
class m200214_102239_create_unnamed_entity_table extends UnnamedEntityMigrationHelper
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $fields = $this->getFieldsDefinition();
        $this->createTable('{{%unnamed_entity}}', $fields);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%unnamed_entity}}');
    }
}
