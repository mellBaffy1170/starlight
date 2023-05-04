<?php

namespace app\controllers;
use app\models\FilterForm;
use app\models\Lodges;
use app\models\Review;
use Yii;
use yii\data\Sort;
use yii\web\Controller;

class MainController extends Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionLodges()
    {
        $sort = new Sort([
            'attributes' => [
                'price'=> [
                    'asc' => ['price' => SORT_ASC],
                    'desc' => ['price' => SORT_DESC],
                    'default' => SORT_ASC,
                    'label' => 'Сортировать по цене',
                ]
            ],
        ]);


        $lodges = Lodges::find()
            ->orderBy($sort->orders)
            ->all();

        $model = new FilterForm();
        if ($model->load(Yii::$app->request->post())) {
            $lodges = $model->filter();
        }

        return $this->render('lodges', [
            'lodges' => $lodges,
            'model' => $model,
            'sort' => $sort,
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

    public function actionSortasc()
    {
        $sort = new Sort([
            'attributes' => [
                'price',
            ],
        ]);

        $lodges_sortASC = Lodges::find()
            ->orderBy(['price' => SORT_ASC])
            ->all();

        return $this->render('lodges',[
            'lodges' => $lodges_sortASC,
            'sort' => $sort,
        ]);
    }

    public function actionSortdesc()
    {

    }

//    public function actionFilter(){
//
////        $model = new FilterForm();
////
////        $lodges_filter = [];
////
////        if ($model->load(Yii::$app->request->post())) {
////            $lodges_filter = $model->filter();
////        }
//
//
//        return $this->render('lodges',[
//            'lodges' => $lodges_filter,
//            'model' => $model,
//        ]);
//    }

}
