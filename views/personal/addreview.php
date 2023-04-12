<?php
/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var \app\models\ReviewForm $model */

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;
use yii\bootstrap5\Modal;

?>
<?php
//Modal::begin([
//    'title' =>'<div>Оставить отзыв</div>',
//    'toggleButton' => ['label' => 'Оставить отзыв'],
//]);
//?>

<div class="review-form">

    <h4>Оставить отзыв</h4>
    <?php $form = ActiveForm::begin([
        'id' => 'register-form',
        'layout' => 'horizontal',
        'fieldConfig' => [
            'template' => "{label}\n{input}\n{error}",
            'labelOptions' => ['class' => 'col-lg-4 col-form-label mr-lg-3'],
            'inputOptions' => ['class' => 'col-lg-4 form-control'],
            'errorOptions' => ['class' => 'col-lg-5 invalid-feedback'],
        ],
    ]); ?>
        <?= $form->field($model, 'rating')->textInput(['type' => 'number', 'min' => 1, 'max' => 5, 'onkeypress' => 'return false', 'autofocus' => true]) ?>
        <?= $form->field($model, 'content')->textarea(['rows' => 6]) ?>
        <?= Html::submitButton('Отправить', ['class' => 'btn btn-dark', 'name' => 'login-button']) ?>
    <?php ActiveForm::end(); ?>


<?php //Modal::end(); ?>

