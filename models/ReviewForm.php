<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\helpers\VarDumper;

class ReviewForm extends Model
{
    public $rating;
    public $content;

    public function rules()
    {
        return [
            [['rating', 'content'], 'required'],
            [['content'], 'string', 'max' => 500, 'message' => '*Строка длиной от 500 символов'],
        ];
    }

    public function addReview($lodge_id, $booking_id){
        $review = new Review();
        $review->user_id = User::findIdentity(Yii::$app->user->id)->id;
        $review->lodge_id = $lodge_id;
        $review->booking_id = $booking_id;
        $review->content = $this->content;
        $review->rating = $this->rating;

        if ($review->save()){
            return true;
        }

        \Yii::error("Отзыв не был добавлен. ". VarDumper::dumpAsString($review->errors));
        return false;
    }

    public function attributeLabels()
    {
        return [
            'rating' => 'Рейтинг',
            'content' => 'Сообщение',
        ];
    }

}