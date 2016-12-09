<?php

use \amd_php_dev\yii2_components\migrations\generators\Menu;
use \amd_php_dev\yii2_components\migrations\generators\MenuItem;
use \amd_php_dev\yii2_components\migrations\generators\Param;
use \amd_php_dev\yii2_components\migrations\generators\Redirect;
use \amd_php_dev\yii2_components\migrations\generators\Page;
use \amd_php_dev\yii2_components\widgets\form\SmartInput;
use \amd_php_dev\yii2_components\models\SmartRecord;

class m160415_071450_main_module extends \amd_php_dev\yii2_components\migrations\Migration
{
    public $menuTableName = '{{%menu}}';
    public $menuItemTableName = '{{%menu_item}}';
    public $paramTableName = '{{%param}}';
    public $redirectTableName = '{{%redirect}}';
    public $tagTableName = '{{%tag}}';

    public function safeUp()
    {
        // Создаём таблицу меню
        $menuGenerator = new Menu($this, $this->menuTableName);
        $menuGenerator->create();

        // Создаём таблицу элементов меню
        $menuItemGenerator = new MenuItem($this, $this->menuItemTableName);
        $menuItemGenerator->create();

        // Главное меню
        $this->insert(
            $this->menuTableName,
            [
                'name'      => 'Главное меню',
                'section'   => 'main',
                'active'    => \amd_php_dev\module_main\models\Menu::ACTIVE_ACTIVE,
            ]
        );

        $paramGenerator = new Param($this, $this->paramTableName);
        $paramGenerator->create();

        $this->insert(
            $this->paramTableName,
            [
                'param'     => 'THEME',
                'active' => SmartRecord::ACTIVE_ACTIVE,
                'value'     => 'base',
                'default'   => 'base',
                'name'      => 'Тема сайта',
                'type'      => 'theme',
                'input_type'=> SmartInput::TYPE_SELECT,
            ]
        );

        $this->insert(
            $this->paramTableName,
            [
                'param'     => 'APP.NAME',
                'active' => SmartRecord::ACTIVE_ACTIVE,
                'value'     => 'Новый сайт',
                'default'   => 'Новый сайт',
                'name'      => 'Имя сайта',
                'type'      => 'string',
                'input_type'=> SmartInput::TYPE_TEXT,
            ]
        );

        $this->insert(
            $this->paramTableName,
            [
                'param'     => 'PARAM.ADMIN_EMAIL',
                'active' => SmartRecord::ACTIVE_ACTIVE,
                'value'     => 'webmaster-amd@yandex.ru',
                'default'   => 'webmaster-amd@yandex.ru',
                'name'      => 'Email администратора',
                'type'      => 'string',
                'input_type'=> SmartInput::TYPE_TEXT,
            ]
        );

        $this->insert(
            $this->paramTableName,
            [
                'param'     => 'PARAM.SUPPORT_EMAIL',
                'active' => SmartRecord::ACTIVE_ACTIVE,
                'value'     => 'webmaster-amd@yandex.ru',
                'default'   => 'webmaster-amd@yandex.ru',
                'name'      => 'Email поддержки',
                'type'      => 'string',
                'input_type'=> SmartInput::TYPE_TEXT,
            ]
        );

        $this->insert(
            $this->paramTableName,
            [
                'param'     => 'PARAM.HOST',
                'active' => SmartRecord::ACTIVE_ACTIVE,
                'value'     => 'example.com',
                'default'   => 'example.com',
                'name'      => 'Хост',
                'type'      => 'string',
                'input_type'=> SmartInput::TYPE_TEXT,
            ]
        );

        $this->insert(
            $this->paramTableName,
            [
                'param'     => 'PARAM.DATA_TEMP_DIR',
                'active' => SmartRecord::ACTIVE_ACTIVE,
                'value'     => '/data/temp/',
                'default'   => '/data/temp/',
                'name'      => 'Путь к временной папке (относительно web)',
                'type'      => 'string',
                'input_type'=> SmartInput::TYPE_TEXT,
            ]
        );

        $this->insert(
            $this->paramTableName,
            [
                'param'     => 'MAILER.FILE_TRANSPORT',
                'active' => SmartRecord::ACTIVE_ACTIVE,
                'value'     => 1,
                'default'   => 1,
                'name'      => 'Писать почту в файл',
                'type'      => 'boolean',
                'input_type'=> SmartInput::TYPE_CHECKBOX,
            ]
        );

        $this->insert(
            $this->paramTableName,
            [
                'param'     => 'MAILER.HOST',
                'active' => SmartRecord::ACTIVE_ACTIVE,
                'value'     => 'smtp.yandex.ru',
                'default'   => 'smtp.yandex.ru',
                'name'      => 'Хост почты',
                'type'      => 'string',
                'input_type'=> SmartInput::TYPE_TEXT,
            ]
        );

        $this->insert(
            $this->paramTableName,
            [
                'param'     => 'MAILER.USERNAME',
                'active' => SmartRecord::ACTIVE_ACTIVE,
                'value'     => 'webmaster-amd',
                'default'   => 'webmaster-amd',
                'name'      => 'Логин почты',
                'type'      => 'string',
                'input_type'=> SmartInput::TYPE_TEXT,
            ]
        );

        $this->insert(
            $this->paramTableName,
            [
                'param'     => 'MAILER.PASSWORD',
                'active' => SmartRecord::ACTIVE_ACTIVE,
                'value'     => 'Te3wcRhx3FPJ',
                'default'   => 'Te3wcRhx3FPJ',
                'name'      => 'Пороль почты',
                'type'      => 'string',
                'input_type'=> SmartInput::TYPE_TEXT,
            ]
        );

        $this->insert(
            $this->paramTableName,
            [
                'param'     => 'MAILER.PORT',
                'active' => SmartRecord::ACTIVE_ACTIVE,
                'value'     => '465',
                'default'   => '465',
                'name'      => 'Порт почты',
                'type'      => 'string',
                'input_type'=> SmartInput::TYPE_TEXT,
            ]
        );

        $this->insert(
            $this->paramTableName,
            [
                'param'     => 'MAILER.ENCRYPTION',
                'active' => SmartRecord::ACTIVE_ACTIVE,
                'value'     => 'ssl',
                'default'   => 'ssl',
                'name'      => 'Шифрование',
                'type'      => 'string',
                'input_type'=> SmartInput::TYPE_TEXT,
            ]
        );

        $this->insert(
            $this->paramTableName,
            [
                'param' => 'PARAM.IMAGE_FULL.MAX_WIDTH',
                'active' => SmartRecord::ACTIVE_ACTIVE,
                'value' => '1280',
                'default' => '1280',
                'name'    => 'Максимальная ширина картинки',
                'type'    => 'string',
                'input_type' => SmartInput::TYPE_NUMBER,
            ]
        );

        $this->insert(
            $this->paramTableName,
            [
                'param' => 'PARAM.IMAGE_FULL.MAX_HEIGHT',
                'active' => SmartRecord::ACTIVE_ACTIVE,
                'value' => '720',
                'default' => '720',
                'name'    => 'Максимальная высота картинки',
                'type'    => 'string',
                'input_type' => SmartInput::TYPE_NUMBER,
            ]
        );

        $this->insert(
            $this->paramTableName,
            [
                'param' => 'PARAM.IMAGE_THUMB.MAX_WIDTH',
                'active' => SmartRecord::ACTIVE_ACTIVE,
                'value' => '400',
                'default' => '400',
                'name'    => 'Максимальная ширина картинки',
                'type'    => 'string',
                'input_type' => SmartInput::TYPE_NUMBER,
            ]
        );

        $this->insert(
            $this->paramTableName,
            [
                'param' => 'PARAM.IMAGE_THUMB.MAX_HEIGHT',
                'active' => SmartRecord::ACTIVE_ACTIVE,
                'value' => '300',
                'default' => '300',
                'name'    => 'Максимальная высота картинки',
                'type'    => 'string',
                'input_type' => SmartInput::TYPE_NUMBER,
            ]
        );

        $this->insert(
            $this->paramTableName,
            [
                'param' => 'PARAM.FILE.MAX_SIZE',
                'active' => SmartRecord::ACTIVE_ACTIVE,
                'value' =>  10 * 1024 * 1024,
                'default' => 10 * 1024 * 1024,
                'name'    => 'Максимальный размер файла в кБ',
                'type'    => 'string',
                'input_type' => SmartInput::TYPE_NUMBER,
            ]
        );

        $userGenerator = new Redirect($this, $this->redirectTableName);
        $userGenerator->create();

        // Создание таблицы тегов
        $tagGenerator = new Page($this, $this->tagTableName);
        $tagGenerator->additionalColumns['frequency'] = $this->integer()->defaultValue(0);
        $tagGenerator->create();
    }

    public function safeDown()
    {
        $this->dropTable($this->menuItemTableName);
        $this->dropTable($this->menuTableName);
        $this->dropTable($this->paramTableName);
        $this->dropTable($this->redirectTableName);
        $this->dropTable($this->tagTableName);
    }
}
