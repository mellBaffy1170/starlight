<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\LodgeImage $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="lodge-image-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'lodge_id')->textInput() ?>

    <?= $form->field($model, 'image')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
