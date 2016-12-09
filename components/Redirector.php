<?php
/**
 * Created by PhpStorm.
 * User: nofuture17
 * Date: 07.12.15
 * Time: 11:55
 */

namespace app\modules\main\components;


class Redirector
{
    // Массив редиректов из базы
    public $redirects = [];
    // Текущий url
    public $url;

    public function __construct($url = null)
    {
        if ($url == null) {
            $this->url = \Yii::$app->request->url;
        } else {
            $this->url = $url;
        }

        $this->redirects = $this->getRedirects();

    }

    /**
     * Получаем массив редиректов из базы
     * (использует кеширование)
     */
    public function getRedirects()
    {
        return \app\modules\main\models\Redirect::getDb()->cache(function($db) {
            return \app\modules\main\models\Redirect::find()->getRedirects();
        });
    }

    public function run()
    {
        foreach ($this->redirects as $redirect) {
            if ($this->url === $redirect['from']) {
                \Yii::$app->response->redirect($redirect['to'], $redirect['code']);
                \Yii::$app->end();
            }
        }
    }
}