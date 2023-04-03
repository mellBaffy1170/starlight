<?php

namespace app\controllers;

use app\models\DataForm;
use app\models\Lodges;
use Yii;
use yii\web\Controller;

class LodgeController extends Controller
{
    public function actionIndex()
    {
        $lodges = Lodges::getAll();
        return $this->render('index', [
            'lodges' => $lodges,
        ]);
    }

    public function actionEmptydata(){
        $lodgesAll = Lodges::getAll();
        $lodgesFree = [];
        $model = new DataForm();
        Yii::debug(Yii::$app->request->post());
        if ($model->load(Yii::$app->request->post())) {
            $lodgesFree = $model->filterDates($lodgesAll);
        }
//        \Yii::debug($lodgesAll);
        return $this->render('index',[
            'lodges' => $lodgesFree,
        ]);

    }

    public function actionBooking($lodge_id)
    {
        return $this->render('booking', [
            'lodge_id' => $lodge_id,
        ]);
    }

    public function actionAddbooking(){
        return $this->redirect(['main/index']);
    }

}
