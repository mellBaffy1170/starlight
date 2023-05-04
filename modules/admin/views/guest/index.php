<?php

use app\models\GuestCard;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/** @var yii\web\View $this */
/** @var app\modules\admin\models\GuestSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title =  'Гостевые карты пользователей';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="guest-card-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Добавить', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'user_id',
            'last_name',
            'first_name',
            'phone_number',
            //'email:email',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, GuestCard $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
