<?php
/** @var yii\web\View $this */
/** @var \app\models\Lodges[] $lodges */
/** @var \app\models\FilterForm $model */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var Sort $sort */


use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;
use yii\data\Sort;
use yii\helpers\Url;


?>

    <div class="fixed-container">
        <div class="sort_price">
            <div class="sort_icons">
                <button class="btn btn-light"><?= $sort->link('price') ?></button>
<!--                <a href="--><?php //= Url::to(['main/sortdesc']); ?><!--" ><img class="icon_sort" src="/web/img/icons/sort-down.png" alt=""/></a>-->
            </div>
        </div>

        <div class="form-filter">

            <?php $form = ActiveForm::begin([
                'action' => Url::to(['main/lodges']),
                'id' => 'login-form',
                'layout' => 'horizontal',
                'fieldConfig' => [
                    'template' => "{label}\n{input}\n{error}",
                    'labelOptions' => ['class' => 'col-lg-1 col-form-label mr-lg-3'],
                    'inputOptions' => ['class' => 'col-lg-3 form-control'],
                    'errorOptions' => ['class' => 'col-lg-7 invalid-feedback'],
                ],
            ]); ?>


            <?= $form->field($model, 'child')->checkbox([], false); ?>
            <?= $form->field($model, 'terrace')->checkbox([], false); ?>
            <?= $form->field($model, 'fridge')->checkbox([], false); ?>
            <?= $form->field($model, 'tv')->checkbox([], false); ?>
            <?= $form->field($model, 'wifi')->checkbox([], false); ?>
            <?= $form->field($model, 'shower')->checkbox([], false); ?>
            <?= $form->field($model, 'dishes')->checkbox([], false); ?>
            <?= $form->field($model, 'pets')->checkbox([], false); ?>

            <?= Html::submitButton('Применить', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
            <?php ActiveForm::end(); ?>
            <!--        <form class="form-filter">-->
<!--            <div>Фильтр по параметрам:</div>-->
<!--            <div class="filter">-->
<!--                <div class="form-sort">-->
<!--                    <input class="form-check-input" type="checkbox" value="" id="terrace">-->
<!--                    <label class="form-check-label" for="terrace">-->
<!--                        Терраса-->
<!--                    </label>-->
<!--                </div>-->
<!--                <div class="form-sort">-->
<!--                    <input class="form-check-input" type="checkbox" value="" id="fridge">-->
<!--                    <label class="form-check-label" for="fridge">-->
<!--                        Холодильник-->
<!--                    </label>-->
<!--                </div>-->
<!--                <div class="form-sort">-->
<!--                    <input class="form-check-input" type="checkbox" value="" id="tv">-->
<!--                    <label class="form-check-label" for="tv">-->
<!--                        Телевизор-->
<!--                    </label>-->
<!--                </div>-->
<!--                <div class="form-sort">-->
<!--                    <input class="form-check-input" type="checkbox" value="" id="wifi">-->
<!--                    <label class="form-check-label" for="wifi">-->
<!--                        Wi-fi-->
<!--                    </label>-->
<!--                </div>-->
<!--                <div class="form-sort">-->
<!--                    <input class="form-check-input" type="checkbox" value="" id="shower">-->
<!--                    <label class="form-check-label" for="shower">-->
<!--                        Душевая-->
<!--                    </label>-->
<!--                </div>-->
<!--                <div class="form-sort">-->
<!--                    <input class="form-check-input" type="checkbox" value="" id="dishes">-->
<!--                    <label class="form-check-label" for="dishes">-->
<!--                        Посуда-->
<!--                    </label>-->
<!--                </div>-->
<!--                <div class="form-sort">-->
<!--                    <input class="form-check-input" type="checkbox" value="" id="child">-->
<!--                    <label class="form-check-label" for="child">-->
<!--                        Дети-->
<!--                    </label>-->
<!--                </div>-->
<!--                <div class="form-sort">-->
<!--                    <input class="form-check-input" type="checkbox" value="" id="pets">-->
<!--                    <label class="form-check-label" for="pets">-->
<!--                        Животные-->
<!--                    </label>-->
<!--                </div>-->
<!--            </div>-->
<!--            <button type="button" class="btn btn-light">Отфильтровать</button>-->
<!--        </form>-->
            <a href="<?php Url::to(['main/lodges']) ?>"><button class="btn btn-dark">Сбросить</button></a>
        </div>
    </div>

    <div class="lodges-container">


        <?php

        if(empty($lodges)){
            echo "Ничего не найдено:(";
        }
        else{
            foreach ($lodges as $lodge){
                echo \app\widgets\LodgeSimpleWidget::widget([
                    'lodge' =>$lodge,
                ]);
            }
        }
        ?>

    </div>


