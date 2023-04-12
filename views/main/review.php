<?php
/** @var yii\web\View $this */
/** @var \app\models\Review[] $review_all */

use \app\widgets\ReviewWidget;
?>

<div class="reviews-container">
    <?php

    if(empty($review_all)){
        echo "Ничего не найдено:(";
    }
    else{
        foreach ($review_all as $review){
            echo ReviewWidget::widget([
                'review' =>$review,
            ]);
        }
    }

    ?>
</div>