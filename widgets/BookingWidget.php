<?php

namespace app\widgets;

use app\models\GuestCard;
use app\models\Lodges;
use app\models\Review;
use app\models\User;
use Yii;
use yii\base\Widget;
use yii\helpers\Url;

class BookingWidget extends Widget
{
    public $booking;
    public $close_booking;
    private $markup;

    public function init() {
        parent::init();
        $this->markup = $this->createBookingMarkup($this->booking);
    }

    public function run() {
        return $this->markup;
    }

    private function createBookingMarkup($booking){
        $id = $booking->id;
        $guest_card_id = $booking->guest_card_id;
        $lodge_id = $booking->lodge_id;
        $status_id = $booking->status_id;
        $date = $booking->date;
        $total_cost = $booking->total_cost;
        $start_date = $booking->start_date;
        $end_date = $booking->end_date;
        $number_of_persons = $booking->number_of_persons;
        $number_of_kids = $booking->number_of_kids;

        $total_number = $number_of_persons + $number_of_kids;

        $currentId = User::findIdentity(Yii::$app->user->id)->id;
        $last_name_array = GuestCard::find()
            ->select('last_name')
            ->from('guest_card')
            ->where(['user_id' => $currentId])
            ->all();

        $first_name_array = GuestCard::find()
            ->select('first_name')
            ->from('guest_card')
            ->where(['user_id' => $currentId])
            ->all();
        $last_name = $last_name_array[0]->last_name;
        $first_name = $first_name_array[0]->first_name;

        $lodge_title_array = Lodges::find()
            ->select('title')
            ->from('lodges')
            ->where(['id' => $lodge_id])
            ->all();
        $lodge_title = $lodge_title_array[0]->title;
        $date_diff = (strtotime($end_date) - strtotime($start_date))/(60 * 60 * 24);

        $review_all = Review::getAll();

        $review_btn = '';


        foreach ($this->close_booking as $item) {
            if($booking == $item){

                foreach ($review_all as $review){
                    if($review->booking_id == $id){

                        Yii::debug($id);
                        $review_btn = '<div>Вы уже оставили отзыв на это бронирование</div>';

                    }
                    else{

                        $review_btn = '<a href=' . Url::to(['personal/addreview', 'lodge_id' => $lodge_id,
                                'booking_id' => $id,
                            ]) . '><button class="btn btn-outline-dark">Оставить отзыв</button></a>';

                    }
                }

            }
        }


        return "<div class = check_card_container>
        <div class = 'check_head'>
            <div>
                <div>Заезд: </div>
                <div>$start_date</div>
            </div>
            <div class='check-exit'>
                <div>Выезд: </div>
                <div>$end_date</div>
            </div>
        </div>
        <h4>$lodge_title</h4>
        <h5>Бронирование на имя: <i> $last_name $first_name </i></h5>
        <h6 class='margin-top'>Бронирование на $date_diff суток, на $total_number человека</h6>
        <div>(Взрослых: $number_of_persons</div>
        <div>Детей: $number_of_kids)</div>
        <div class = 'check-footer'>
            <h4 class='margin-top'>Итоговая стоимость: $total_cost BYN</h4>
            $review_btn
        </div>
        
    </div>
        ";
    }

}