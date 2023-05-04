<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Lodges $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="lodges-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'main_image')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'lodge_plan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'price')->textInput() ?>

    <?= $form->field($model, 'price_0_3')->textInput() ?>

    <?= $form->field($model, 'price_4_12')->textInput() ?>

    <?= $form->field($model, 'sleeping_places')->textInput() ?>

    <?= $form->field($model, 'add_places')->textInput() ?>

    <?= $form->field($model, 'terrace')->textInput() ?>

    <?= $form->field($model, 'fridge')->textInput() ?>

    <?= $form->field($model, 'tv')->textInput() ?>

    <?= $form->field($model, 'wi_fi')->textInput() ?>

    <?= $form->field($model, 'shower')->textInput() ?>

    <?= $form->field($model, 'dishes')->textInput() ?>

    <?= $form->field($model, 'children')->textInput() ?>

    <?= $form->field($model, 'pets')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
