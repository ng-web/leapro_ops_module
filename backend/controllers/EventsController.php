<?php

namespace backend\controllers;

use Yii;
use backend\models\Events;
use backend\models\EventsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Response;
use yii\helpers\Json;


/**
 * EventsController implements the CRUD actions for Events model.
 */
class EventsController extends Controller
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
     * Lists all Events models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new EventsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        $events = Events::find()->all();
        $tasks = [];
        
        foreach ($events as $sched){
            
            $event = new \yii2fullcalendar\models\Event();
            $event->id = $sched->event_id;
            $event->title = $sched->event_title;
            $event->description = $sched->event_description;
            $event->start = $sched->event_start;
            $event->end = $sched->event_end;
            //$event->url = Yii::$app()->createUrl("events/view", ["id"=>$event->id]);
            $event->startEditable = true;
            
            $tasks[] = $event;
        }
        
        
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'events'       => $tasks,
        ]);
    }
    
    //ArrayDataProvider && JSON
    public function actionJson()
    {
        $events = Yii::$app->db->createCommand('SELECT * FROM events')
                    ->queryAll();
        
        $tasks = [];

        foreach ($events as $sched){
            
            $eventArray['id'] = $sched['event_id'];
            $eventArray['title'] = stripslashes($sched['event_title']);
            $eventArray['description'] = $sched['event_description'];
            $eventArray['start'] = $sched['event_start'];
            $eventArray['end'] = $sched['event_end'];
            
            $tasks[] = $eventArray;
        }
        echo Json::encode($tasks);
        //var_dump($tasks); die();
    }

    public function actionScheduler() 
    {
        //Yii::$app->response->format = Response::FORMAT_JSON;
        return $this->render('scheduler', []);
        
    }
    
    /**
     * Displays a single Events model.
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
     * Creates a new Events model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Events();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->event_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Events model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->event_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Events model.
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
     * Finds the Events model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Events the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Events::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
