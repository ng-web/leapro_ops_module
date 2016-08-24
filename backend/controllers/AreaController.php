<?php

namespace backend\controllers;

use Yii;
use backend\models\Area;
use backend\models\AreaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use backend\models\PmiActivity;

/**
 * AreaController implements the CRUD actions for Area model.
 */
class AreaController extends Controller
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
     * Lists all Area models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AreaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Area model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $areaStations = Yii::$app->db->createCommand('SELECT customer_company, address_line1, area_name, equipment_name, COUNT(*) as total_deployed FROM deploy DP
                    INNER JOIN customer C 
                    ON DP.customer_id = C.customer_id
                    INNER JOIN address A 
                    ON DP.address_id = A.address_id
                    INNER JOIN area L 
                    ON DP.area_id = L.area_id
                    INNER JOIN equipment E
                    ON DP.equipment_id = E.equipment_id
                    WHERE L.area_id = :id
                    GROUP BY area_name')
                    ->bindValue(':id', $id)
                    ->queryAll();
        
        return $this->render('view', [
            'model' => $this->findModel($id),
            'areaStations' => $areaStations,
        ]);
    }

    /**
     * Creates a new Area model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Area();
        $area = Area::find()->all();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->area_id]);
        } else {
            return $this->renderAjax('create', [
                'model' => $model,
                //'area' => $area,
            ]);
        }
    }
    
    //pmi activity button function
    public function actionPmi()
    {
        $model = new PmiActivity();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Area model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->area_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Area model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }
    
     //dependent dropdown list controller function
    public function actionLists($id)
    {
        $countAreas = Area::find()
                ->where(['address_id'=>$id])
                ->count();

        $areas = Area::find()
                ->where(['address_id'=>$id])
                ->all();

        if($countAreas > 0){

            foreach($areas as $area){
                echo "<option value='".$area->area_id."'>".$area->area_name."</option>";
            }
        }
        else{
            echo "<option>-</option>";
        }
    }

    /**
     * Finds the Area model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Area the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Area::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
