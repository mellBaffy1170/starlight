<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\Sort;
use yii\db\Query;

class FilterForm extends Model
{
    public $child;
    public $terrace;
    public $fridge;
    public $tv;
    public $wifi;
    public $shower;
    public $dishes;
    public $pets;

    public function rules()
    {
        return [
            [['child', 'terrace', 'fridge', 'tv', 'wifi', 'shower', 'dishes', 'pets'], 'default', 'value' => '0'],
            [['child', 'terrace', 'fridge', 'tv', 'wifi', 'shower', 'dishes', 'pets'], 'boolean'],
        ];
    }

    public function filter(){

        if($this->terrace){
            $params['terrace'] = '1';
        }
        if($this->fridge){
            $params['fridge'] = '1';
        }
        if($this->tv){
            $params['tv'] = '1';
        }
        if($this->wifi){
            $params['wi_fi'] = '1';
        }
        if($this->shower){
            $params['shower'] = '1';
        }
        if($this->dishes){
            $params['dishes'] = '1';
        }
        if($this->child){
            $params['children'] = '1';
        }
        if($this->pets){
            $params['pets'] = '1';
        }

        Yii::debug($params);


        $lodges_test = Lodges::find()
            ->filterWhere($params)
            ->all();

        Yii::debug($lodges_test);

        return $lodges_test;
    }

    public function attributeLabels()
    {
        return [
            'terrace' => 'Терраса',
            'fridge' => 'Холодильник',
            'tv' => 'Телевизор',
            'wifi' => 'Wi-fi',
            'shower' => 'Душевая',
            'dishes' => 'Посуда',
            'child' => 'Можно с детьми',
            'pets' => 'Можно с животными',
        ];
    }

}