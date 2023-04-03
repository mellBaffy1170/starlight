<?php

namespace app\widgets;

use yii\base\Widget;
use yii\helpers\Url;

class LodgeWidget extends Widget
{
    public $lodge;
    private $markup;

    public function init() {
        parent::init();
        $this->markup = $this->createLodgeMarkup($this->lodge);
    }

    public function run() {
        return $this->markup;
    }

    private function createLodgeMarkup($lodge){
        $id = $lodge->id;
        $title = $lodge->title;
        $main_image = $lodge->main_image;
        $lodge_plan = $lodge->lodge_plan;
        $description = $lodge->description;
        $price = $lodge->price;
        $price_0_3 = $lodge->price_0_3;
        $price_4_7 = $lodge->price_4_7;
        $price_8_12 = $lodge->price_8_12;
        $sleeping_places = $lodge->sleeping_places;
        $terrace = $lodge->terrace;
        $fridge = $lodge->fridge;
        $tv = $lodge->tv;
        $wi_fi = $lodge->wi_fi;
        $shower = $lodge->shower;
        $dishes = $lodge->dishes;
        $children = $lodge->children;
        $pets = $lodge->pets;



        $d_none = 'display: none';

        if(!$terrace){
            $icon_terrace = $d_none;
        }
        if(!$fridge){
            $icon_fridge = $d_none;
        }
        if(!$tv){
            $icon_tv = $d_none;
        }
        if(!$wi_fi){
            $icon_wi_fi = $d_none;
        }
        if(!$shower){
            $icon_shower = $d_none;
        }
        if(!$dishes){
            $icon_dishes = $d_none;
        }
        if(!$children){
            $icon_children = $d_none;
        }
        if(!$pets){
            $icon_pets = $d_none;
        }


        return "<div class='card-container'>
                    <div class='card-content'>
                        <div class='card-content_photo'>
                            <img src='/web/$main_image' alt=''>
                        </div>
                        <div class='card-content_description'>
                            <div class='card-title'>$title</div>
                            <div class='persons'>Вместимость: $sleeping_places</div>
                            <div class='card_icons'>
                                <div class='tooltipp'><img class='icon' style='$icon_terrace' src='/web/img/icons/terrace.png' alt=''>
                                <span class='tooltiptext'>Терраса</span></div>
                                <div class='tooltipp'><img class='icon' style='$icon_shower' src='/web/img/icons/shower.png' alt=''>
                                <span class='tooltiptext'>Душ</span></div>
                                <div class='tooltipp'><img class='icon' style='$icon_tv' src='/web/img/icons/tv.png' alt=''>
                                <span class='tooltiptext'>Проектор</span></div>
                                <div class='tooltipp'><img class='icon' style='$icon_wi_fi' src='/web/img/icons/wi-fi.png' alt=''>
                                <span class='tooltiptext'>Wi-fi</span></div>
                                <div class='tooltipp'><img class='icon' style='$icon_fridge' src='/web/img/icons/fridge.png' alt=''>
                                <span class='tooltiptext'>Холодильник</span></div>
                                <div class='tooltipp'><img class='icon' style='$icon_dishes' src='/web/img/icons/dishes.png' alt=''>
                                <span class='tooltiptext'>Посуда</span></div>
                                <div class='tooltipp'><img class='icon' style='$icon_children' src='/web/img/icons/child.png' alt=''>
                                <span class='tooltiptext'>Дети</span></div>
                                <div class='tooltipp'><img class='icon' style='$icon_pets' src='/web/img/icons/pets.png' alt=''>
                                <span class='tooltiptext'>Животные</span></div>
                            </div>
                            <div class='booking_prices'>
                                <div class='booking_price'>Стоимость аренды для взрослых: <b>$price BYN/сутки</b></div>
                                <div class='booking_price'>Стоимость аренды для детей 0-3: <b>$price_0_3 BYN/сутки</b>></div>
                                <div class='booking_price'>Стоимость аренды для детей 4-7: <b>$price_4_7 BYN/сутки</b>></div>
                                <div class='booking_price'>Стоимость аренды для детей 8-12: <b>$price_8_12 BYN/сутки</b>></div>
                            </div>
                        </div>
                    </div>
        
                    <details>
                        <summary>Подробнее</summary>
                        <p class='details'>$description</p>
                    </details>

        
                    <div class='card-booking'>
                        <a href=" . Url::to(['lodge/booking', 'lodge_id' => $id]) . "><button class='btn btn-dark'>Забронировать</button></a>
                    </div>
                </div>
        ";
    }

}