<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\GuestCard $model */

$this->title = Yii::t('app', 'Create Guest Card');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Guest Cards'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="guest-card-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
