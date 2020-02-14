<?php

use devskyfly\yiiModuleAdminPanel\migrations\helpers\contentPanel\EntityMigrationHelper;

/**
 * Handles the creation of table `{{%entity_withou_section}}`.
 */
class m200214_084654_create_entity_without_section_table extends EntityMigrationHelper
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $fields = $this->getFieldsDefinition();
        $this->createTable('{{%entity_without_section}}', $fields);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%entity_without_section}}');
    }
}
