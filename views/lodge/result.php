<?php
/** @var View $this */
/** @var Lodges[] $lodges */
/** @var DataForm $datamodel */


use yii\web\View;
use app\models\Lodges;
use app\widgets\LodgeWidget;
use \app\models\DataForm;

$this->title = Yii::$app->name;
$name_title = "Бронирование";

?>




    <h6 class="margin-top">Результаты поиска:</h6>

    <?php

    if(empty($lodges)){
        echo "Ничего не найдено:(";
    }
    else{
        foreach ($lodges as $lodge){
            echo LodgeWidget::widget([
                'lodge' =>$lodge,
                'datamodel' => $datamodel,
            ]);
        }
    }

    ?>

</div>