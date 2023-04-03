<?php

namespace app\models;

use yii\base\Model;
use \yii\db\Query;

class DataForm extends Model
{
    public $dates;
    public $quantity;
//    public $start_date = mb_substr($dates, 0, 10);
//    public $end_date = mb_substr($dates, -10);

    public function rules()
    {
        return [
            [['dates', 'quantity'], 'required'],
        ];
    }

    public function filterDates($lodges){
        $subquery = Booking::find()
            ->select(['lodge_id'])
            ->from('booking')
            ->where(['>=', 'end_date', mb_substr($this->dates, 0, 10)])
            ->andWhere(['<=', 'start_date', mb_substr($this->dates, -10)])
            ->all();
        // находит бронирования на заданные даты, выводит lodge_id
        // id_array хранит id занятых домиков в выбранные даты
        $id_array = array();

        foreach ($subquery as $item){
            $id_array[] = $item->lodge_id;
        }

        \Yii::debug($id_array);

        $lodges = Lodges::find()
            ->select('*')
            ->from('lodges')
//            ->innerJoin('booking', 'booking.lodge_id = lodges.id')
            ->where(['>=', 'sleeping_places', $this->quantity])
            ->andWhere(['not in','id', $id_array])
            ->all();
//
        \Yii::debug($subquery);
        \Yii::debug($lodges);
//        \Yii::debug($this->dates);
//        \Yii::debug($this->quantity);


        return $lodges;
    }

}