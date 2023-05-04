<?php

namespace app\controllers;

use app\models\Booking;
use app\models\DataForm;
use app\models\FilterForm;
use app\models\GuestCard;
use app\models\GuestCardForm;
use app\models\Lodges;
use app\models\LoginForm;
use app\models\User;
use app\widgets\Alert;
use Yii;
use yii\data\Sort;
use yii\helpers\VarDumper;
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

    public function actionFreedata(){
        $lodgesAll = Lodges::getAll();
        $lodgesFree = [];
        $model = new DataForm();
        if ($model->load(Yii::$app->request->post())) {
            $lodgesFree = $model->filterDates($lodgesAll);
        }



        return $this->render('result',[
            'lodges' => $lodgesFree,
            'datamodel' => $model,
        ]);

    }

    public function actionBooking($lodge_id, $title, $date_start, $date_end, $quantity_adults, $quantity_kids, $date_diff, $total)
    {
        if(Yii::$app->user->isGuest){
            $message = 'Для возможности онлайн-бронирования необходимо авторизоваться и заполнить гостевую карту';

            $model = new LoginForm();
            if ($model->load(Yii::$app->request->post()) && $model->login()) {
                $currentRole = User::findIdentity(Yii::$app->user->id)->role;
                if($currentRole == 'admin'){
                    return $this->redirect(['/admin/default/index']);
                }
            }

            return $this->render('..\site\login', [
                'message' => $message,
                'model' => $model,
            ]);
        }

        $u = new User();
        if(!$u->haveGuestCard()){
            $model = new GuestCardForm();
            return $this->render('..\personal\guestcard', [
                'model' => $model,
            ]);
        }
        return $this->render('booking', [
            'lodge_id' => $lodge_id,
            'title' => $title,
            'date_start' => $date_start,
            'date_end' => $date_end,
            'quantity_adults' => $quantity_adults,
            'quantity_kids' => $quantity_kids,
            'date_diff' => $date_diff,
            'total' => $total,
        ]);
    }


    public function actionAddbooking($lodge_id, $start_date, $end_date, $number_of_persons, $number_of_kids, $total_cost){
        $currentId = User::findIdentity(Yii::$app->user->id)->id;
        $guest_card_id_array = GuestCard::find()
            ->select('id')
            ->from('guest_card')
            ->where(['user_id' => $currentId])
            ->all();
        $guest_card_id = $guest_card_id_array[0]->id;
        $today = date("y-m-d");

        $booking = new Booking();
        $booking->guest_card_id = $guest_card_id;
        $booking->lodge_id = $lodge_id;
        $booking->status_id = 1;
        $booking->date = $today;
        $booking->total_cost = $total_cost;
        $booking->start_date = $start_date;
        $booking->end_date = $end_date;
        $booking->number_of_persons = $number_of_persons;
        $booking->number_of_kids = $number_of_kids;

        if ($booking->save()){
            return $this->redirect(['personal/index']);
        }
        \Yii::error("Booking was not saved. ". VarDumper::dumpAsString($booking->errors));
        return false;
    }


}
