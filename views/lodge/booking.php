<?php
/** @var int $lodge_id */
/** @var string $title */
/** @var string $date_start */
/** @var string $date_end */
/** @var int $quantity_adults */
/** @var int $quantity_kids */
/** @var int $date_diff */
/** @var int $total */
/** @var yii\web\View $this */
/** @var yii\bootstrap4\ActiveForm $form */
/** @var app\models\AddOrderForm $model */

use app\models\GuestCard;
use app\models\User;
use yii\helpers\Url;

$quantity_total = $quantity_kids + $quantity_adults;

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


echo "<div class = check_container>
        <div class = 'check_head'>
            <div>
                <div>Заезд: </div>
                <div>$date_start</div>
            </div>
            <div class='check-exit'>
                <div>Выезд: </div>
                <div>$date_end</div>
            </div>
        </div>
        <h4>$title</h4>
        <h5>Бронирование на имя: <i> $last_name $first_name </i></h5>
        <h6 class='margin-top'>Бронирование на $date_diff суток, на $quantity_total человека</h6>
        <div>(Взрослых: $quantity_adults</div>
        <div>Детей: $quantity_kids)</div>
        <div class = 'check-footer'>
            <h4 class='margin-top'>Итоговая стоимость: $total BYN</h4>
            <a href=" . Url::to(['lodge/addbooking', 'lodge_id' => $lodge_id,
                                                'start_date' => $date_start,
                                                'end_date' => $date_end,
                                                'number_of_persons' => $quantity_adults,
                                                'number_of_kids' => $quantity_kids,
                                                'total_cost' => $total,]) . ">
                <button class='btn btn-dark check-btn'>Оформить</button>
            </a>
        </div>
        
    </div>
    
    "

?>



