<?php

namespace frontend\controllers;

use yii\web\Controller;

class SchedulerController extends Controller
{
    // ...existing code...

    public function actionIndex()
    {
        return $this->render('index', []);
    }
    
    public function actionCal()
    {
        return $this->render('cal', []);
    }
}