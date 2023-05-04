<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\PlanImage $model */

$this->title = Yii::t('app', 'Create Plan Image');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Plan Images'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="plan-image-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
