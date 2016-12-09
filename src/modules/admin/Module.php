<?php

namespace amd_php_dev\module_main\modules\admin;

class Module extends \app\components\modules\Admin
{
    public $controllerNamespace = 'amd_php_dev\module_main\modules\admin\controllers';

    public static function getMenuItems() {
        return [
            'section' => 'admin',
            'items' => [
                [
                    'label' => 'Общее',
                    'items' => [
                        ['label' => 'Настройки', 'url' => ['/main/admin/param/index']],
                        ['label' => 'Контакты', 'url' => ['/main/admin/contact/index']],
                        ['label' => 'Почта', 'url' => ['/main/admin/mail/index']],
                        ['label' => 'Теги', 'url' => ['/main/admin/tag/index']],
                        ['label' => 'Редиректы', 'url' => ['/main/admin/redirect/index']],
                        ['label' => 'Сбросить кэш', 'url' => ['/main/admin/cache/flush']],
                        ['label' => 'Менеджер файлов', 'url' => ['/main/elfinder/manager']],
                        ['label' => 'Галереи', 'url' => ['/main/admin/gallery/index']],
                        ['label' => 'Мета-данные', 'url' => ['/main/admin/meta-data/index']],
                        [
                            'label' => 'Меню',
                            'items' => [
                                ['label' => 'Секции', 'url' => ['/main/admin/menu/index']],
                                ['label' => 'Элементы', 'url' => ['/main/admin/menu-item/index']],
                            ],
                        ]
                    ]
                ]
            ],
        ];
    }

    public function init()
    {
        parent::init();

        // custom initialization code goes here
    }
}
