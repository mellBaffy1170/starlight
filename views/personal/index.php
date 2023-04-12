<?php
/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var app\models\PersonalForm $model */
///** @var app\models\Booking[] $user_booking */

use app\models\Booking;
use app\models\GuestCard;
use app\models\User;
use app\widgets\BookingWidget;
use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;


?>

<ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item" role="presentation">
        <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Личная информация</button>
    </li>
    <li class="nav-item" role="presentation">
        <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">История бронирования</button>
    </li>
</ul>
<div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active form-guest" id="home" role="tabpanel" aria-labelledby="home-tab">
        <h6 class="margin-top">Изменить данные:</h6>
        <?php $form = ActiveForm::begin([
            'id' => 'login-form',
            'layout' => 'horizontal',
            'fieldConfig' => [
                'template' => "{label}\n{input}\n{error}",
                'labelOptions' => ['class' => 'col-lg-2 col-form-label mr-lg-3'],
                'inputOptions' => ['class' => 'col-lg-4 form-control'],
                'errorOptions' => ['class' => 'col-lg-5 invalid-feedback'],
            ],
        ]); ?>

            <?= $form->field($model, 'lastName')->textInput(['autofocus' => true]) ?>
            <?= $form->field($model, 'firstName')->textInput() ?>
            <?= $form->field($model, 'phoneNumber')->textInput() ?>
            <?= $form->field($model, 'email_')->textInput() ?>

            <?= Html::submitButton('Изменить', ['class' => 'btn btn-dark', 'name' => 'login-button']) ?>


        <?php ActiveForm::end(); ?>

    </div>
    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
        <?php
            $user = User::findIdentity((Yii::$app->user->id));
            $currentId = $user->id;
            $guest_card_id_array = GuestCard::find()
                ->select('id')
                ->from('guest_card')
                ->where(['user_id' => $currentId])
                ->all();
            $guest_card_id = $guest_card_id_array[0]->id;
            $user_booking = Booking::find()
                ->select('*')
                ->from('booking')
                ->where(['guest_card_id' => $guest_card_id])
                ->all();

            $today = date("y-m-d");
            $close_booking = Booking::find()
                ->select('*')
                ->from('booking')
                ->where(['guest_card_id' => $guest_card_id])
                ->andWhere(['<=', 'end_date', $today])
                ->all();

            if(empty($user_booking)){
                echo "<h4>Бронирований пока нет:(</h4>";
            }
            else {
                foreach ($user_booking as $item) {
                    echo BookingWidget::widget([
                        'booking' => $item,
                        'close_booking' => $close_booking,
                    ]);
                }
            }

        ?>
    </div>
</div>