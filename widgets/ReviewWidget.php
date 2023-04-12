<?php

namespace app\widgets;

use app\models\Lodges;
use app\models\User;
use yii\base\Widget;

class ReviewWidget extends Widget
{
    public $review;
    private $markup;

    public function init() {
        parent::init();
        $this->markup = $this->createReviewMarkup($this->review);
    }

    public function run() {
        return $this->markup;
    }

    private function createReviewMarkup($review)
    {
        $user_id = $review->user_id;
        $lodge_id = $review->lodge_id;
        $booking_id = $review->booking_id;
        $content = $review->content;
        $rating = $review->rating;

        $lodge = Lodges::findOne($lodge_id);
        $lodge_image = $lodge->main_image;
        $lodge_title = $lodge->title;

        return "<div class='review-container'>
                    <img class='review-image' src='/web/$lodge_image' alt='lodge photo'>
                    <h5 class='review-h5'>$lodge_title</h5>
                    <div class='review-rating'>
                        <img class='review-icon' src='/web/img/icons/star.png' alt=''>
                        <div>$rating</div>
                    </div>
                    <div class='review-content'>$content</div>
                </div>";
    }
}