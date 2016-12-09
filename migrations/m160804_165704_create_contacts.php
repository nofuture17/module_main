<?php

use yii\db\Migration;

class m160804_165704_create_contacts extends \amd_php_dev\yii2_components\migrations\Migration
{
    public $contactTableName = 'main_contact';
        
    public function up()
    {
        $generator = new \amd_php_dev\yii2_components\migrations\generators\Generator($this, $this->contactTableName);
        $generator->additionalColumns['code'] = $this->string(255);
        $generator->addIndex('code');
        $generator->additionalColumns['name'] = $this->string(255);
        $generator->additionalColumns['value'] = $this->string(255);
        $generator->additionalColumns['description'] = $this->string(255);
        $generator->create();
    }

    public function down()
    {
        $tables = get_class_vars($this);

        foreach ($tables as $table) {
            if (preg_match('/^\S+TableName$/', $table)) {
                $this->dropTable($table);
            }
        }

        return true;
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
