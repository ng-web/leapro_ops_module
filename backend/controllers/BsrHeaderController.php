<?php

namespace backend\controllers;

use Yii;
use backend\models\BsrHeader;
use backend\models\BsrHeaderSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use backend\models\BsrActivity;
use yii\helpers\ArrayHelper;
use backend\models\Model;

/**
 * BsrHeaderController implements the CRUD actions for BsrHeader model.
 */
class BsrHeaderController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all BsrHeader models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new BsrHeaderSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single BsrHeader model.
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
     * Creates a new BsrHeader model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new BsrHeader();
        $modelsBsrActivity = [new BsrActivity];
        
        if ($model->load(Yii::$app->request->post())) {
            
            //$model->bsr_date = date('Y-m-d H:i:s A T');
            //$model->employee_id = Yii::$app->user->id;

            $modelsBsrActivity = Model::createMultiple(BsrActivity::classname());
            Model::loadMultiple($modelsBsrActivity, Yii::$app->request->post());

            // ajax validation
//            if (Yii::$app->request->isAjax) {
//                Yii::$app->response->format = Response::FORMAT_JSON;
//                return ArrayHelper::merge(
//                    ActiveForm::validateMultiple($modelsAddress),
//                    ActiveForm::validate($modelCustomer)
//                );
//            }
            
//            var_dump($model);
//           var_dump($modelsBsrActivity);
//            
            // validate all models
            $valid = $model->validate();
            //BSR fields are valid
//            var_dump($valid);
//            exit();
            $valid = Model::validateMultiple($modelsBsrActivity) && $valid;
            //$valid is evaluating to false
//            var_dump($valid);
//            exit();
            if ($valid) {
                $transaction = \Yii::$app->db->beginTransaction();
                try {
                    if ($flag = $model->save(false)) {
                        foreach ($modelsBsrActivity as $modelBsrActivity) {
                            $modelBsrActivity->bsr_id = $model->bsr_id;
                            if (! ($flag = $modelBsrActivity->save(false))) {
                                $transaction->rollBack();
                                break;
                            }
                        }
                    }
                    if ($flag) {
                        $transaction->commit();
                        return $this->redirect(['view', 'id' => $model->bsr_id]);
                    }
                } catch (Exception $e) {
                    $transaction->rollBack();
                }
            }
            
           

//        if ($model->load(Yii::$app->request->post()) && $model->save()) {
//            return $this->redirect(['view', 'id' => $model->bsr_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'modelsBsrActivity' => (empty($modelsBsrActivity)) ? [new BsrActivity] : $modelsBsrActivity
            ]);
        }
    }

    /**
     * Updates an existing BsrHeader model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->bsr_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing BsrHeader model.
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
     * Finds the BsrHeader model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return BsrHeader the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = BsrHeader::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    //function to see baitstations
     public function actionBait($bsrid){
        $sql = "SELECT * FROM `bsr_activity` WHERE `bsr_id`= $bsrid";
        try {
            $rawData = \Yii::$app->db->createCommand($sql)->queryAll();
        } catch (\yii\db\Exception $e) {
            throw new \yii\web\ConflictHttpException('sql error');
        }
        $dataProvider = new \yii\data\ArrayDataProvider([
            'allModels' => $rawData,
            'pagination' => FALSE,
        ]);
        return $this->render('bait', [
                    'dataProvider' => $dataProvider,
                    //'sql'=>$sql,
                   
        ]);
        
    }
}
