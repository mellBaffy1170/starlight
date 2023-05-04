<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\LodgeImage $model */

$this->title = Yii::t('app', 'Create Lodge Image');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Lodge Images'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lodge-image-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
