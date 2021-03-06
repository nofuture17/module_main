<?php

namespace amd_php_dev\module_main;

use Yii;

/**
 * Description of Main
 *
 * @author nofuture17
 */
class Module extends \amd_php_dev\yii2_components\modules\Module implements \yii\base\BootstrapInterface
{
    public function init()
    {
        parent::init();
        $this->controllerMap = \yii\helpers\ArrayHelper::merge(
            [
                'elfinder' => [
                    'class' => 'mihaildev\elfinder\Controller',
                    'layout' => '@app/views/layouts/admin',
                    'access' => ['admin'], //глобальный доступ к фаил менеджеру @ - для авторизорованных , ? - для гостей , чтоб открыть всем ['@', '?']
                    'disabledCommands' => ['netmount'], //отключение ненужных команд https://github.com/Studio-42/elFinder/wiki/Client-configuration-options#commands
                    'roots' => [
                        [
                            'baseUrl' => '@web',
                            'basePath' => '@webroot',
                            'path' => 'data',
                            'name' => 'Global'
                        ],

                    ],
                    'managerOptions' => [
                        'validName' => '/^[^.]{1}.*$/',
                    ],
                ]
            ],
            $this->controllerMap
        );

        $this->modules = [
            'admin' => [
                'class' => '\amd_php_dev\module_main\modules\admin\Module',
            ],
        ];
    }

    public function getUrlRules()
    {
        return array_merge(
            parent::getUrlRules(),
            [
                [
                    'rules' => [
                        '/admin' => '/main/admin/default/index'
                    ],
                    'append' => true,
                ],
                [
                    'rules' => [new \amd_php_dev\module_main\urlRules\Rules()],
                    'append' => true,
                ],
            ]
        );
    }
}