<?php

use devskyfly\yiiModuleAdminPanel\migrations\helpers\contentPanel\BinderMigrationHelper;
use yii\db\Migration;

/**
 * Handles the creation of table `{{%binder}}`.
 */
class m200214_083949_create_binder_table extends BinderMigrationHelper
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $fields = $this->getFieldsDefinition();
        $this->createTable('{{%binder}}', $fields);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%binder}}');
    }
}
