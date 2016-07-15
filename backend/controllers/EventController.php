<?php

namespace backend\controllers;

use Yii;
use backend\models\Event;
use backend\models\EventSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Json;

/**
 * EventController implements the CRUD actions for Event model.
 */
class EventController extends Controller
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
     * Lists all Event models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new EventSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        
        $events = Event::find()->all();
        $tasks = [];
        
        foreach ($events as $sched){
            
            $event = new \yii2fullcalendar\models\Event();
            $event->id = $sched->id;
            $event->title = $sched->title;
            $event->description = $sched->description;
            $event->start = $sched->start_date;
            $event->end = $sched->end_date;
            //$event->url = 'index.php?r=event/view';
            $event->startEditable = true;
            
            $tasks[] = $event;
        }
        
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'events'       => $tasks,
        ]);
    }
    
    public function actionJson()
    {
        $cal = Event::find()->all();
        echo Json::encode($cal);
    }
    
    //event url function
    public function actionUrl($id)
    {
        $event = $this->findModel($id);
        echo Json::encode($event);
        
//        return $this->render('view', [
//            'event' => $event,
        //]);
    }

    /**
     * Displays a single Event model.
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
     * Creates a new Event model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Event();

        if ($model->load(Yii::$app->request->post())) {
            
            $recurr = $model->recurring;
            $frequency = $model->period;
            $until = (365/$frequency);
            
            if ($recurr == true && $frequency == 1){
                
                 for($x = 0; $x <$until; $x++){
                     
                    $start_date = strtotime($start . '+' . $repeat_freq . 'DAYS');
                    $end_date = strtotime($end . '+' . $repeat_freq . 'DAYS');
                    $start = date("Y-m-d H:i", $start_date);
                    $end = date("Y-m-d H:i";, $end_date);
                 }
                
            }
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Event model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Event model.
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
     * Finds the Event model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Event the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Event::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
