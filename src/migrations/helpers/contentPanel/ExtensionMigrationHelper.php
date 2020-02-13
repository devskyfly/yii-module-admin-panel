<?php
namespace devskyfly\yiiModuleAdminPanel\migrations\helpers\contentPanel;

class ExtensionMigrationHelper extends AbstractMigrationHelper
{
    public function getFieldsDefinition()
    {
        return [
            'id'=>$this->primaryKey(11),
            'item_table'=>$this->string(256)->notNull(),
            '__id'=>$this->integer(11)
        ];
    }
}