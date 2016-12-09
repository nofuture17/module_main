<?php

namespace app\modules\main\controllers;

class DefaultController extends \app\components\controllers\PublicController
{
    public function init()
    {
        parent::init();
        $this->view->params['jsScenarios'] = [
            '/builds/index.js'
        ];

        $this->view->params['cssScenarios'] = [
            '/builds/index.css'
        ];
    }
    
    public function behaviors()
    {
        return [
            'access' => [
                'class' => \yii\filters\AccessControl::className(),
                'only' => ['images-get', 'files-get', 'image-upload', 'file-upload'],
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
            'images-get' => [
                'class' => '\vova07\imperavi\actions\GetAction',
                'url' => '/data/images/all/', // Directory URL address, where files are stored.
                'path' => '@webroot/data/images/all/', // Or absolute path to directory where files are stored.
                'type' => \vova07\imperavi\actions\GetAction::TYPE_IMAGES,
            ],
            'files-get' => [
                'class' => '\vova07\imperavi\actions\GetAction',
                'url' => '/data/files/all/', // Directory URL address, where files are stored.
                'path' => '@webroot/data/files/all/', // Or absolute path to directory where files are stored.
                'type' => \vova07\imperavi\actions\GetAction::TYPE_FILES,
            ],
            'image-upload' => [
                'class'            => '\vova07\imperavi\actions\UploadAction',
                'url'              => '/data/images/all/', // Directory URL address, where files are stored.
                'path'             => '@webroot/data/images/all/', // Or absolute path to directory where files are stored.
                'validatorOptions' => [
                    'maxWidth'  => \Yii::$app->params['IMAGE_FULL.MAX_WIDTH'],
                    'maxHeight' => \Yii::$app->params['IMAGE_FULL.MAX_HEIGHT'],
                ],
            ],
            'file-upload' => [
                'class' => '\vova07\imperavi\actions\UploadAction',
                'url' => '/data/files/all/', // Directory URL address, where files are stored.
                'path' => '@webroot/data/files/all/', // Or absolute path to directory where files are stored.
                'uploadOnlyImage' => false,
                'validatorOptions' => [
                    'maxSize' => (int)\Yii::$app->params['FILE.MAX_SIZE'],
                ]
            ],
        ];
    }
}
