<?php

namespace app\widgets;

use yii\base\Widget;
use yii\helpers\Url;

class LodgeWidget extends Widget
{
    public $lodge;
    private $markup;
    public $datamodel;

    public function init() {
        parent::init();
        $this->markup = $this->createLodgeMarkup($this->lodge, $this->datamodel);
    }

    public function run() {
        return $this->markup;
    }

    private function createLodgeMarkup($lodge, $datamodel){
        $id = $lodge->id;
        $title = $lodge->title;
        $main_image = $lodge->main_image;
        $lodge_plan = $lodge->lodge_plan;
        $description = $lodge->description;
        $price = $lodge->price;
        $price_0_3 = $lodge->price_0_3;
        $price_4_12 = $lodge->price_4_12;
        $sleeping_places = $lodge->sleeping_places;
        $add_places = $lodge->add_places;
        $terrace = $lodge->terrace;
        $fridge = $lodge->fridge;
        $tv = $lodge->tv;
        $wi_fi = $lodge->wi_fi;
        $shower = $lodge->shower;
        $dishes = $lodge->dishes;
        $children = $lodge->children;
        $pets = $lodge->pets;

        $dates = $datamodel->dates;
        $quantity_adults = $datamodel->quantity_adults;
        $quantity_kids = $datamodel->quantity_kids;

        $date_start = mb_substr($dates, 0, 10);
        $date_end = mb_substr($dates, -10);
        $date_diff = (strtotime($date_end) - strtotime($date_start))/(60 * 60 * 24);

        $total = $date_diff * ($price * $quantity_adults + $price_4_12 * $quantity_kids);

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
                            <div class='persons'>Доп. места для детей: $add_places</div>
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
                                <div class='booking_price'>Стоимость аренды для детей 4-12: <b>$price_4_12 BYN/сутки</b>></div>
                                <div class='booking_price'>Стоимость аренды для детей 0-3: <b>$price_0_3 BYN/сутки</b>></div>
                            </div>
                        </div>
                    </div>
        
                    <details>
                        <summary>Подробнее</summary>
                        <p class='details'>$description</p>
                    </details>
                    
                    <div class='margin-left margin-top'>Дата: $dates</div>
                    <div  class='margin-left'>$quantity_adults взрослых, $quantity_kids детей</div>
                    
                    <div class='card-booking'>
                        <div><b>Итого: $total BYN</b></div>
                        <a href=" . Url::to(['lodge/booking', 'lodge_id' => $id,
                                                            'title' => $title,
                                                            'date_start' => $date_start,
                                                            'date_end' => $date_end,
                                                            'quantity_adults' => $quantity_adults,
                                                            'quantity_kids' => $quantity_kids,
                                                            'date_diff' => $date_diff,
                                                            'total' => $total,
                                            ]) . ">
                            <button class='btn btn-dark'>Забронировать</button>
                        </a>
                    </div>
                </div>
        ";
    }

}