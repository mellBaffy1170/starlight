<?php
/** @var View $this */
/** @var Lodges[] $lodges */
/** @var DataForm $data-model */

use yii\web\View;
use app\models\Lodges;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use \app\models\DataForm;

$this->title = Yii::$app->name;
$name_title = "Бронирование";

?>

    <div class="lodge_card-container center">

        <h6 class="h6">ВВЕДИТЕ ПАРАМЕТРЫ ДЛЯ ОНЛАЙН-БРОНИРОВАНИЯ</h6>

        <?php $form = ActiveForm::begin([
            'action' => Url::to(['lodge/freedata']),
            'options' => ['class' => 'form'],
        ]); ?>

            <div class="сalendar_row-filter">

                <div class="margin-right">
                    <label class="form-label" for="DataForm[dates]">Дата заезда - выезда:</label>
                    <input class="form-control" name="DataForm[dates]" id="date" />
                </div>
                <div class="margin-right">
                    <label class="form-label" for="DataForm[quantity_adults]">Количество взрослых:</label>
                    <input value="1" min="1" type="number" name="DataForm[quantity_adults]" id="typeNumber" class="form-control" />
                </div>

                <div class="margin-right">
                    <label class="form-label" for="DataForm[quantity_kids]">Количество детей 4-12 лет:</label>
                    <input value="0" min="0" max="10" type="number" name="DataForm[quantity_kids]]" id="typeNumberKids" class="form-control" />
                </div>

                <?= Html::submitButton('Применить', ['class' => 'btn btn-dark button-find', 'name' => 'filter-button']) ?>

            </div>

        <?php ActiveForm::end(); ?>

    </div>

