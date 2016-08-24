<?php

namespace frontend\controllers;

use yii\web\Controller;

class CalcController extends \yii\base\Controller
{
    public function actionIndex() 
    {
        echo "Ready to Calculate!!";
        return $this->render('index');
    }
}