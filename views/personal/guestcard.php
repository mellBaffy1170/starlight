<?php
/** @var View $this */
/** @var GuestCardForm $model */

use app\models\User;
use yii\web\View;
use yii\helpers\Url;
use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;
use app\models\GuestCardForm;

?>
<h1>Личный кабинет</h1>

<h6 class="margin-bottom">
    Для возможности онлайн-бронирования необходимо заполнить гостевую карту
</h6>

<?php

$currentUser = User::findIdentity(Yii::$app->user->id);

?>

<div class="form-guest">
    <?php $form = ActiveForm::begin([
        'action' => Url::to(['personal/addcard']),
        'options' => ['class' => 'form'],
        'id' => 'register-form',
        'layout' => 'horizontal',
        'fieldConfig' => [
            'template' => "{label}\n{input}\n{error}",
            'labelOptions' => ['class' => 'col-lg-4 col-form-label mr-lg-3'],
            'inputOptions' => ['class' => 'col-lg-4 form-control'],
            'errorOptions' => ['class' => 'col-lg-5 invalid-feedback'],
            ]
    ]); ?>

<!--        <div class="margin-bottom">-->
<!--            <label class="form-label" for="GuestCardForm[lastName]">Фамилия</label>-->
<!--            <input class="form-control" type="text" placeholder="Фамилия" name="GuestCardForm[lastName]" />-->
<!--        </div>-->
<!--        <div class="margin-bottom">-->
<!--            <label class="form-label" for="GuestCardForm[firstName]">Имя</label>-->
<!--            <input class="form-control" type="text" placeholder="Имя"  name="GuestCardForm[firstName]"/>-->
<!--        </div>-->
<!--        <div class="margin-bottom">-->
<!--                    <label class="form-label" for="GuestCardForm[phoneNumber]">Имя</label>-->
<!--            <input class="form-control" type="text" placeholder="Номер телефона"  name="GuestCardForm[phoneNumber]"/>-->
<!--        </div>-->
    <?= $form->field($model, 'lastName')->textInput(['autofocus' => true]) ?>
    <?= $form->field($model, 'firstName')->textInput() ?>

    <?= $form->field($model, 'phoneNumber')->textInput() ?>

        <?= Html::submitButton('Создать', ['class' => 'btn btn-dark', 'name' => 'filter-button']) ?>

    <?php ActiveForm::end(); ?>
</div>
