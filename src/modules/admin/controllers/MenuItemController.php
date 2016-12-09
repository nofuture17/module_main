<?php

namespace amd_php_dev\module_main\modules\admin\controllers;

use Yii;
use amd_php_dev\module_main\models\MenuItem;
use amd_php_dev\module_main\models\MenuItemSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use \app\components\helpers;
/**
 * MenuItemController implements the CRUD actions for MenuItem model.
 */
class MenuItemController extends \app\components\controllers\AdminController
{
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

    /**
     * Lists all MenuItem models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new MenuItemSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        $this->view->title = 'Элементы меню';
        $this->view->params['breadcrumbs'][] = $this->view->title;

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Creates a new MenuItem model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new MenuItem();

        if ($this->createModel($model)) {
            return $this->redirect(['index']);
        } else {

            $this->view->title = 'Добавить элемент меню';
            $this->view->params['breadcrumbs'][] = ['label' => 'Элементы меню', 'url' => ['index']];
            $this->view->params['breadcrumbs'][] = $this->view->title;

            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing MenuItem model.
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

                $this->view->title = 'Редактировать элемент меню: ' . ' ' . $model->name;
                $this->view->params['breadcrumbs'][] = ['label' => 'Элементы меню', 'url' => ['index']];
                $this->view->params['breadcrumbs'][] = 'Редактировать: ' . $model->name;

                return $this->render('update', [
                    'model' => $model,
                ]);
            }
        }
    }

    /**
     * Deletes an existing MenuItem model.
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
     * Finds the MenuItem model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return MenuItem the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = MenuItem::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
