<?php
/** @var View $this */
/** @var Lodges[] $lodges */
/** @var DataForm $data-model */

use yii\web\View;
use app\models\Lodges;
use app\widgets\LodgeWidget;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use \app\models\DataForm;

$this->title = Yii::$app->name;
$name_title = "Бронирование";

?>


    <div class="fixed-container">
        <div>Сортировать по:</div>
        <div class="sort_price">
            <div>цене </div>
            <div class="sort_icons">
                <a><img class="icon_sort" src="/web/img/icons/sort-up.png"/></a>
                <a><img class="icon_sort" src="/web/img/icons/sort-down.png"/></a>
            </div>
        </div>
        <div class="sort_quant">
            <div>вместимости </div>
            <div class="sort_icons">
                <a><img class="icon_sort" src="/web/img/icons/sort-up.png"/></a>
                <a><img class="icon_sort" src="/web/img/icons/sort-down.png"/></a>
            </div>        </div>
    </div>
    <div class="lodge_card-container">

        <?php $form = ActiveForm::begin([
            'action' => Url::to(['lodge/emptydata']),
            'options' => ['class' => 'form'],
        ]); ?>

            <div class="сalendar_row-filter">
                <div class="margin-right">
                    <label class="form-label" for="DataForm[dates]">Дата заезда - выезда</label>
                    <input class="form-control" name="DataForm[dates]" id="date" />
                </div>
                <div class="margin-right">
                    <label class="form-label" for="DataForm[quantity]">Количество человек</label>
                    <input value="1" min="1" type="number" name="DataForm[quantity]" id="typeNumber" class="form-control" />
                </div>

                <?= Html::submitButton('Применить', ['class' => 'btn btn-dark button-find', 'name' => 'filter-button']) ?>
            </div>

        <?php ActiveForm::end(); ?>

        <?php

        if(empty($lodges)){
            echo "Ничего не найдено:(";
        }
        else{
            foreach ($lodges as $lodge){
                echo LodgeWidget::widget([
                    'lodge' =>$lodge,
                ]);
            }
        }

        ?>
    </div>

