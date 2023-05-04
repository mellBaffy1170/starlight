<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\helpers\VarDumper;

class GuestCardForm extends Model
{
    public $lastName;
    public $firstName;
    public $phoneNumber;
    public $currentUser;

    public function rules()
    {
        return [
            [['lastName', 'firstName', 'phoneNumber'], 'required', 'message' => '*Обязательное поле'],
            [['lastName', 'firstName'], 'string', 'min' => 3, 'max' => 50, 'message' => '*Строка длиной от 3 до 50 символов'],
            [['phoneNumber'], 'string', 'min' => 13, 'max' => 13, 'message' => '*Строка длиной 13 символов'],
            [['lastName'], 'match', 'pattern' => '/^([А-Я]{1}[а-яё]{1,23}|[A-Z]{1}[a-z]{1,23})$/', 'message' => '*Пример заполнения фамилии Трошко или Klinton'],
            [['firstName'], 'match', 'pattern' => '/^([А-Я]{1}[а-яё]{1,23}|[A-Z]{1}[a-z]{1,23})$/', 'message' => '*Пример заполнения имени Валерия или Ann'],
            [['phoneNumber'], 'match', 'pattern' => '/^(\+375)(29|25|44|33)(\d{3})(\d{2})(\d{2})$/', 'message' => '*Пример заполнения номера +375298277417'],
        ];
    }

    public function addGuestCard($currentUser){

        $guestCard = new GuestCard();

        $guestCard->user_id = Yii::$app->user->id;
        $guestCard->last_name = $this->lastName;
        $guestCard->first_name = $this->firstName;
        $guestCard->phone_number = $this->phoneNumber;
        $guestCard->email = $currentUser->email;

        if ($guestCard->save()){
            return true;
        }

        Yii::error("Гостевая карта не была создана. ". VarDumper::dumpAsString($guestCard->errors));
        return false;
    }

    public function attributeLabels()
    {
        return [
            'lastName' => 'Фамилия',
            'firstName' => 'Имя',
            'phoneNumber' => 'Телефон',
        ];
    }
}