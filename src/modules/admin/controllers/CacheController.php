<?php

namespace amd_php_dev\module_main\modules\admin\controllers;

class CacheController extends \amd_php_dev\yii2_components\controllers\AdminController
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => \yii\filters\AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['admin'],
                    ],
                ],
            ],
        ];
    }

    public function actionFlush()
    {
        if (\Yii::$app->cache->flush()) {
            \Yii::$app->getSession()->setFlash('success', 'Кэш успешно очищен');
        } else {
            \Yii::$app->getSession()->setFlash('error', 'Не удалось очистить кэш');
        }

        $referrer = \Yii::$app->request->referrer;
        if (!empty($referrer)) {
            $this->redirect($referrer);
        } else {
            $this->redirect(['/']);
        }

    }
}
