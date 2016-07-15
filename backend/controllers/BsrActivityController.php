<?php

namespace backend\controllers;

use Yii;
use backend\models\BsrActivity;
use backend\models\BsrActivitySearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * BsrActivityController implements the CRUD actions for BsrActivity model.
 */
class BsrActivityController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all BsrActivity models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new BsrActivitySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        
        $stationsByDocnum = Yii::$app->db->createCommand('SELECT equipment_id, bs_status, bs_qty 
            FROM `bsr_activity` INNER JOIN `bsr_header` 
            ON bsr_activity.bsr_id=bsr_header.bsr_id 
            WHERE bsr_header.bsr_docnum LIKE "%E21 9--6.4.02%"')
            ->queryAll();
        
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'stationsByDocnum' => $stationsByDocnum,
        ]);
    }
    
    public function actionJson()
    {
        $stationsByDocnum = Yii::$app->db->createCommand('SELECT equipment_id, bs_status, bs_qty 
            FROM `bsr_activity` INNER JOIN `bsr_header` 
            ON bsr_activity.bsr_id=bsr_header.bsr_id 
            WHERE bsr_header.bsr_docnum LIKE "%E21 9--6.4.02%"')
            ->queryAll();
    }

        /**
     * Displays a single BsrActivity model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new BsrActivity model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new BsrActivity();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->bs_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing BsrActivity model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->bs_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing BsrActivity model.
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
     * Finds the BsrActivity model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return BsrActivity the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = BsrActivity::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
