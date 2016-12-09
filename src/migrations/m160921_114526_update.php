<?php

use yii\db\Migration;

class m160921_114526_update extends \amd_php_dev\yii2_components\migrations\Migration
{
    public $mailTableName = '{{%main_mail}}';

    public function up()
    {
        $generator = new \amd_php_dev\yii2_components\migrations\generators\Generator($this, $this->mailTableName);
        $generator->additionalColumns['name'] = $this->string(255);
        $generator->additionalColumns['address'] = $this->string(255);
        $generator->additionalColumns['page'] = $this->string(255);
        $generator->additionalColumns['data'] = $this->text();
        $generator->create();
    }

    public function down()
    {
        $this->dropTable($this->mailTableName);
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
