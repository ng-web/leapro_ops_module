<?php

namespace backend\controllers;

use Yii;
use backend\models\Customer;
use backend\models\CustomerSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\SqlDataProvider;
use yii\helpers\Json;


/**
 * CustomerController implements the CRUD actions for Customer model.
 */
class CustomerController extends Controller
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
     * Lists all Customer models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CustomerSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    
    //custom view
    public function actionGetCustomers()
    {
        $sql = 'SELECT * FROM customer';
        $raw = Yii::$app->db->createCommand($sql)->queryAll();
        
        return $raw;
    }
    
    public function actionCustomIndex()
    {
        $data['customers'] = $this->actionGetCustomers();
       // $data['locations'] = $this->actionGetLocations();
        
        return $this->render('custom-index', $data);
    }
       
    public function actionGetLocations($id)
    {
        $sql = "SELECT * FROM address WHERE customer_id =".$id;
        $raw = Yii::$app->db->createCommand($sql)->queryAll();
        
        return $raw;
    }
    
    public function actionCustomView($id)
    {
        $data['id'] = $id;
        
        $locations = $this->actionGetLocations();
        foreach($locations as $location){
            
            if ($id==$location['id']){
                //this is then our target book
                $data['name'] = $location['customer_name'];
                $data['company'] = $location['customer_company'];
            }
        }
        
        return $this->render('custom-view', $data);
    }

    /**
     * Displays a single Customer model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        //$locations = actionGetLocations($id);
//        var_dump($id); die();
//        foreach($locations as $location){
//            
//        //var_dump($location['customer_id']); die();
//
//            //this is then our target book
//            $data['address'] = $location['address_line1'];
//            $data['province'] = $location['address_province'];
//            
//        }
//        //var_dump($data[]); die();
        
//        $model = $this->findModel($id);
        //var_dump($model->getAddresses()); die(); 
//        var_dump($model->addresses); die();
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Customer model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Customer();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->customer_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Customer model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->customer_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Customer model.
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
     * Finds the Customer model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Customer the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Customer::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
