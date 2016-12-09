<?php

namespace app\modules\main\modules\admin\controllers;

use Yii;
use app\modules\main\models\GalleryPage;
use app\modules\main\models\GalleryPageSearch;
use amd_php_dev\yii2_components\controllers\AdminController;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * GalleryController implements the CRUD actions for GalleryPage model.
 */
class GalleryController extends AdminController
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return \yii\helpers\ArrayHelper::merge(
            parent::behaviors(),
            [
                'access' => [
                    'class' => \yii\filters\AccessControl::className(),
                    'rules' => [
                        [
                            'allow' => true,
                            'roles' => ['admin'],
                        ],
                    ],
                ]
            ]
        );
    }

    public function actions()
    {
        return [
            'image-gallery' => [
                'class' => '\app\components\actions\GalleryAction',
                'modelClass' => GalleryPage::className(),
                'galleryManagerName' => 'imageGallery',
            ],
            'video-gallery' => [
                'class' => '\app\components\actions\GalleryAction',
                'modelClass' => GalleryPage::className(),
                'galleryManagerName' => 'imageGallery',
            ]
        ];
    }

    /**
     * Lists all GalleryPage models.
     * @return mixed
     */
    public function actionIndex()
    {
    
        $this->view->title = 'Страницы-галереии';
        $this->view->params['breadcrumbs'][] = 'Главный модуль';
        $this->view->params['breadcrumbs'][] = $this->view->title;
        
        $searchModel = new GalleryPageSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single GalleryPage model.
     * @param integer $id
     * @return mixed
     */
    //public function actionView($id)
    //{
    //    $this->view->title = $model->name;
    //    $this->view->params['breadcrumbs'][] = ['label' => 'Gallery Pages', 'url' => ['index']];
    //    $this->params['breadcrumbs'][] = $this->view->title;
    //
    //    return $this->render('view', [
    //        'model' => $this->findModel($id),
    //    ]);
    //}

    /**
     * Creates a new GalleryPage model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new GalleryPage();

        if ($this->createModel($model)) {
            return $this->redirect(['index']);
        } else {

            $this->view->title = 'Добавить';
            $this->view->params['breadcrumbs'][] = 'Главный модуль';
            $this->view->params['breadcrumbs'][] = ['label' => 'Страницы-галереии', 'url' => ['index']];
            $this->view->params['breadcrumbs'][] = $this->view->title;

            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing GalleryPage model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if (\Yii::$app->request->isAjax) {
            $this->updateModelAjax($model);
        } else {
            if ($this->updateModel($model)) {
                return $this->redirect(['index']);
            } else {

                $this->view->title = 'Редактировать: ' . $model->name;
                $this->view->params['breadcrumbs'][] = 'Главный модуль';
                $this->view->params['breadcrumbs'][] = ['label' => 'Страницы-галереии', 'url' => ['index']];
                //$this->view->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
                $this->view->params['breadcrumbs'][] = $this->view->title;

                return $this->render('update', [
                    'model' => $model,
                ]);
            }
        }
    }

    /**
     * Deletes an existing GalleryPage model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the GalleryPage model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return GalleryPage the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = GalleryPage::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
