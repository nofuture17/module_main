<?php
/**
 * User: lagprophet
 * Date: 22.12.15
 * Time: 12:46
 */

namespace amd_php_dev\module_main\modules\admin\controllers;

class DefaultController extends \app\components\controllers\AdminController
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

    public function actionIndex()
    {
        return $this->render('index');
    }
}