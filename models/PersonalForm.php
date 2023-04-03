<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\helpers\VarDumper;

class PersonalForm extends Model
{

    public $lastName;
    public $firstName;
    public $phoneNumber;
    public $email_;

    public function rules()
    {
        return [
            [['lastName', 'firstName', 'phoneNumber', 'email'], 'required', 'message' => '*Обязательное поле'],
            [['lastName', 'firstName', 'email_'], 'string', 'min' => 3, 'max' => 50, 'message' => '*Строка длиной от 3 до 50 символов'],
            [['phoneNumber'], 'string', 'min' => 13, 'max' => 13, 'message' => '*Строка длиной 13 символов']
        ];
    }

    public function updateGuestCard(){

        $currentUser = User::findIdentity(Yii::$app->user->id);
        $currentId = User::findIdentity(Yii::$app->user->id)->id;
        $currentGuest = GuestCard::find()
            ->select('*')
            ->from('guest_card')
            ->where(['user_id' => $currentId])
            ->one();
        $currentGuest->last_name = $this->lastName;
        $currentGuest->first_name = $this->firstName;
        $currentGuest->phone_number = $this->phoneNumber;
        $currentGuest->email = $this->email_;
        $currentUser->email = $this->email_;

        if ($currentGuest->save() &&  $currentUser->save()){
            return true;
        }

        Yii::error("Гостевая карта не была изменена. ". VarDumper::dumpAsString($currentGuest->errors));
        return false;
    }

    public function attributeLabels()
    {
        return [
            'lastName' => 'Фамилия',
            'firstName' => 'Имя',
            'phoneNumber' => 'Телефон',
            'email_' => 'Почта',
        ];
    }

}