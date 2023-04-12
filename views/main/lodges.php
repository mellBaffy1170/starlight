<?php
/** @var \app\models\Lodges[] $lodges */


?>

    <div class="fixed-container">
        <div class="sort_price">
            <div>Сортировать по цене:</div>
            <div class="sort_icons">
                <a><img class="icon_sort" src="/web/img/icons/sort-up.png"/></a>
                <a><img class="icon_sort" src="/web/img/icons/sort-down.png"/></a>
            </div>
        </div>
        <form class="form-filter">
            <div>Фильтр по параметрам:</div>
            <div class="filter">
                <div class="form-sort">
                    <input class="form-check-input" type="checkbox" value="" id="terrace">
                    <label class="form-check-label" for="terrace">
                        Терраса
                    </label>
                </div>
                <div class="form-sort">
                    <input class="form-check-input" type="checkbox" value="" id="fridge">
                    <label class="form-check-label" for="fridge">
                        Холодильник
                    </label>
                </div>
                <div class="form-sort">
                    <input class="form-check-input" type="checkbox" value="" id="tv">
                    <label class="form-check-label" for="tv">
                        Телевизор
                    </label>
                </div>
                <div class="form-sort">
                    <input class="form-check-input" type="checkbox" value="" id="wifi">
                    <label class="form-check-label" for="wifi">
                        Wi-fi
                    </label>
                </div>
                <div class="form-sort">
                    <input class="form-check-input" type="checkbox" value="" id="shower">
                    <label class="form-check-label" for="shower">
                        Душевая
                    </label>
                </div>
                <div class="form-sort">
                    <input class="form-check-input" type="checkbox" value="" id="dishes">
                    <label class="form-check-label" for="dishes">
                        Посуда
                    </label>
                </div>
                <div class="form-sort">
                    <input class="form-check-input" type="checkbox" value="" id="child">
                    <label class="form-check-label" for="child">
                        Дети
                    </label>
                </div>
                <div class="form-sort">
                    <input class="form-check-input" type="checkbox" value="" id="pets">
                    <label class="form-check-label" for="pets">
                        Животные
                    </label>
                </div>
            </div>
            <button type="button" class="btn btn-light">Отфильтровать</button>
        </form>
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


