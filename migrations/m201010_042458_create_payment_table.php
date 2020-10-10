<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%payment}}`.
 */
class m201010_042458_create_payment_table extends Migration
{
    public $tableName = '{{%payment}}';
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable($this->tableName, [
            'id' => $this->primaryKey(),
            'payment_number' => $this->integer(),
            'date' => $this->integer(),
            'sum' => $this->integer(),
            'months' => $this->integer(),
            'rate' => $this->double(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable($this->tableName);
    }
}
