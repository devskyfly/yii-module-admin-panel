<?php

use yii\db\Migration;

/**
 * Handles the creation of table `binder`.
 */
class m181212_124233_create_binder_table extends Migration
{
    public $table='binder';
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable($this->table, [
            'id' => $this->primaryKey(),
            'name'=>$this->string(255),
            'master_id'=>$this->integer(11),
            'slave_id'=>$this->integer(11)
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable($this->table);
    }
}
