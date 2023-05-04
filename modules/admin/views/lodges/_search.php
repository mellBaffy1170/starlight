<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\modules\admin\models\LodgesSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="lodges-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'title') ?>

    <?= $form->field($model, 'main_image') ?>

    <?= $form->field($model, 'lodge_plan') ?>

    <?= $form->field($model, 'description') ?>

    <?php // echo $form->field($model, 'price') ?>

    <?php // echo $form->field($model, 'price_0_3') ?>

    <?php // echo $form->field($model, 'price_4_12') ?>

    <?php // echo $form->field($model, 'sleeping_places') ?>

    <?php // echo $form->field($model, 'add_places') ?>

    <?php // echo $form->field($model, 'terrace') ?>

    <?php // echo $form->field($model, 'fridge') ?>

    <?php // echo $form->field($model, 'tv') ?>

    <?php // echo $form->field($model, 'wi_fi') ?>

    <?php // echo $form->field($model, 'shower') ?>

    <?php // echo $form->field($model, 'dishes') ?>

    <?php // echo $form->field($model, 'children') ?>

    <?php // echo $form->field($model, 'pets') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
