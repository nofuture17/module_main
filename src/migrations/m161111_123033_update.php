<?php

use yii\db\Migration;

class m161111_123033_update extends Migration
{
    public $tableName = '{{%main_meta_data}}';

    public function up()
    {
        $schema = \yii::$app->getDb()->getSchema();

        // Размер для оборудования
        if (!$schema->getTableSchema($this->tableName)->getColumn('text')) {
            $this->addColumn($this->tableName, 'text', $this->text());
        }
    }

    public function down()
    {
        echo "m161111_123033_update cannot be reverted.\n";

        return false;
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
