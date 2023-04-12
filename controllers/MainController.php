<?php

namespace app\controllers;
use app\models\Lodges;
use app\models\Review;
use yii\web\Controller;

class MainController extends Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionLodges()
    {
        $lodges_simple = Lodges::getAll();
        return $this->render('lodges', [
            'lodges' => $lodges_simple,
        ]);
    }

    public function actionService()
    {
        return $this->render('service');
    }

    public function actionReview()
    {
        $review_all = Review::getAll();
        return $this->render('review', [
            'review_all' => $review_all,
        ]);
    }

    public function actionAbout()
    {
        return $this->render('about');
    }

}
