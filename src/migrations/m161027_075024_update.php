<?php

use yii\db\Migration;

class m161027_075024_update extends \amd_php_dev\yii2_components\migrations\Migration
{
    public $tableName = '{{%main_meta_data}}';

    public function up()
    {
        $generator = new \amd_php_dev\yii2_components\migrations\generators\Generator($this, $this->tableName);
        $generator->additionalColumns['url'] = $this->string(255);
        $generator->addIndex('url');
        $generator->additionalColumns['h1'] = $this->string(255);
        $generator->additionalColumns['metaDescription'] = $this->string(255);
        $generator->additionalColumns['metaTitle'] = $this->string(80);
        $generator->create();
    }

    public function down()
    {
        $this->dropTable($this->tableName);

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
