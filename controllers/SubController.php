<?php
/**
 * Created by PhpStorm.
 * User: v-11
 * Date: 25.11.2016
 * Time: 17:57
 */

namespace app\modules\main\controllers;


use app\components\controllers\PublicController;

class SubController extends PublicController
{
    public function actionIndex()
    {
        if (false)
        {
            ob_start();
            include_once $_SERVER['DOCUMENT_ROOT'].'/subdomains/'.$_SERVER['HTTP_HOST'].'/index.htm';
            $html = ob_get_contents();
            ob_end_clean();
            //$html = str_replace(array('<link href="', '<img src="'), array('<link href="/subdomains/'.$_SERVER['HTTP_HOST'].'/', '<img src="/subdomains/'.$_SERVER['HTTP_HOST'].'/'), $html);
            $html = preg_replace(array('/(<link.*href=")/', '/(<img.*src=")/', '/(<script.*src=")/'), '$1/subdomains/'.$_SERVER['HTTP_HOST'].'/', $html);
            echo $html;
        } else {
            header('HTTP/1.1 301 Moved Permanently');
            header('Location: http://' . \yii::$app->params['HOST']);
        }

        die();
    }
}