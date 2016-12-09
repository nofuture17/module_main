<?php

use \amd_php_dev\yii2_components\migrations\generators\Page;
use \amd_php_dev\yii2_components\migrations\generators\GalleryItem;
use \amd_php_dev\yii2_components\migrations\generators\TagRelation;

class m160824_115125_update extends \amd_php_dev\yii2_components\migrations\Migration
{
    public $galleryPageTableName        = '{{%main_gallery_page}}';
    public $imageGalleryTableName       = '{{%main_gallery_image}}';
    public $videoGalleryTableName       = '{{%main_gallery_video}}';
    public $galleryPageToTagTableName   = '{{%main_gallery_to_tag}}';

    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
        $this->createGallery();
    }

    public function safeDown()
    {
        $tables = get_class_vars($this);

        foreach ($tables as $table) {
            if (preg_match('/^\S+TableName$/', $table)) {
                $this->dropTable($table);
            }
        }
    }

    public function createGallery()
    {
        $generator = new Page($this, $this->galleryPageTableName);
        $generator->create();

        // Создание таблицы галереии изображений новостей
        $generator = new GalleryItem($this, $this->imageGalleryTableName);
        $generator->create();

        // Создание таблицы галереии видео новостей
        $generator = new GalleryItem($this, $this->videoGalleryTableName);
        $generator->create();

        $generator = new TagRelation($this, $this->galleryPageToTagTableName);
        $generator->create();
    }
}
