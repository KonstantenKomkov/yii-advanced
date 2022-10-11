<?php

namespace backend\controllers;

use common\models\AccessToken;
use common\models\AccessTokenSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * AccessTokenController implements the CRUD actions for AccessToken model.
 */
class AccessTokenController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all AccessToken models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new AccessTokenSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single AccessToken model.
     * @param int $tokenId Token ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($tokenId)
    {
        return $this->render('view', [
            'model' => $this->findModel($tokenId),
        ]);
    }

    /**
     * Creates a new AccessToken model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new AccessToken();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'tokenId' => $model->tokenId]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing AccessToken model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $tokenId Token ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($tokenId)
    {
        $model = $this->findModel($tokenId);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'tokenId' => $model->tokenId]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing AccessToken model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $tokenId Token ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($tokenId)
    {
        $this->findModel($tokenId)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the AccessToken model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $tokenId Token ID
     * @return AccessToken the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($tokenId)
    {
        if (($model = AccessToken::findOne(['tokenId' => $tokenId])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
