<?php

use app\models\Lodges;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/** @var yii\web\View $this */
/** @var app\modules\admin\models\LodgesSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Домики';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lodges-index">

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
            'title',
            'main_image',
            'lodge_plan',
            'description',
            //'price',
            //'price_0_3',
            //'price_4_12',
            //'sleeping_places',
            //'add_places',
            //'terrace',
            //'fridge',
            //'tv',
            //'wi_fi',
            //'shower',
            //'dishes',
            //'children',
            //'pets',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Lodges $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
