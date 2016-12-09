<?php
/**
 * Created by PhpStorm.
 * User: nofuture17
 * Date: 05.11.2016
 * Time: 21:06
 */

namespace app\modules\main\urlRules;

use yii\web\UrlRuleInterface;
use yii\base\Object;

class Rules extends Object implements UrlRuleInterface
{

    public function createUrl($manager, $route, $params)
    {
        return false;  // this rule does not apply
    }

    public function parseRequest($manager, $request)
    {
        $pathInfo = $request->getPathInfo();

        $host = preg_quote(\Yii::$app->params['HOST']);
        if (preg_match("/^\S+\.{$host}$/", $request->hostName)) {
            $index = $_SERVER['DOCUMENT_ROOT'] . '/subdomains/' . $_SERVER['HTTP_HOST'] . '/index.htm';
            if (file_exists($index)) {
                return ['main/sub/index', []];
            }
        }

        if (preg_match("/^mail\/(:?([\S]+))?$/", $pathInfo, $matches)) {

            if (!empty($matches[2])) {
                return ['main/mail/' . $matches[2], []];
            }
        }

        if ($request->hostName != \yii::$app->params['HOST']) {
            return false;
        }
        
        return false;
    }
}