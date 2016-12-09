<?php
/**
 * Created by PhpStorm.
 * User: nofuture17
 * Date: 01.12.15
 * Time: 19:08
 */

namespace amd_php_dev\module_main\components;

use \amd_php_dev\module_main\models\Param;

/**
 * Класс для выгребания из базы конфиг в виде массива (и грабит корованы)
 * @package amd_php_dev\module_main\components
 */
class SiteConfig
{
    /**
     * @var Сам массив с конфигом
     */
    static protected $_config;

    /**
     * Грабит кo`рован (базу)
     */
    static public function getConfig()
    {
        if (!empty(self::$_config))
            return self::$_config;

        self::$_config = Param::getDb()->cache(function ($db) {
            $config = [];
            $params = Param::find()->asArray(true)->all();

            foreach ($params as $item) {
                $value = (isset($item['value'])) ? $item['value'] : $item['default'];
                $config[$item['param']] = $value;
            }
            
            return $config;
        });

        return self::$_config;
    }
}