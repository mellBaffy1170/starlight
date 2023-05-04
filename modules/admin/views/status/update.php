<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Status $model */

$this->title = Yii::t('app', 'Изменить статус: {name}', [
    'name' => $model->status,
]);
$this->params['breadcrumbs'][] = ['label' => 'Статусы', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->status, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Изменить';
?>
<div class="status-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
