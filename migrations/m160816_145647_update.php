<?php

use yii\db\Migration;

class m160816_145647_update extends Migration
{
    public $menuItemTableName = '{{%menu_item}}';
    public function up()
    {
        $schema = \yii::$app->getDb()->getSchema();

        // Размер для оборудования
        if (!$schema->getTableSchema($this->menuItemTableName)->getColumn('image')) {
            $this->addColumn($this->menuItemTableName, 'image', $this->string(255));
        }
    }

    public function down()
    {
        echo "m160816_145647_update cannot be reverted.\n";

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
