<?php

namespace app\controllers;
use yii\web\Controller;

class MainController extends Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionService()
    {
        return $this->render('service');
    }

    public function actionReview()
    {
        return $this->render('review');
    }

    public function actionAbout()
    {
        return $this->render('about');
    }

}
