<?php

use yii\db\Migration;

/**
 * Class m190311_085202_alter_ip_black_list_table
 */
class m190311_085202_alter_ip_black_list_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->renameColumn('ip_black_list', 'name', 'ip');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190311_085202_alter_ip_black_list_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190311_085202_alter_ip_black_list_table cannot be reverted.\n";

        return false;
    }
    */
}
