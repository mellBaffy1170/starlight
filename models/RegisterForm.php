<?php

namespace app\models;

use yii\base\Model;
use yii\helpers\VarDumper;

class RegisterForm extends Model
{
    public $username;
    public $email;
    public $password;

    public $password_repeat;

    public function rules()
    {
        return [
            [['username', 'email', 'password', 'password_repeat'], 'required', 'message' => '*Обязательное поле'],
            [['username'], 'string', 'min' => 4, 'max' => 40, 'message' => '*Строка длиной от 4 до 40 символов'],
            [['email'], 'string', 'min' => 11, 'max' => 70, 'message' => '*Строка длиной от 11 до 70 символов'],
            [['email'], 'match', 'pattern' => '^([a-z0-9_-]+\.)*[a-z0-9_-]+@[a-z0-9_-]+(\.[a-z0-9_-]+)*\.[a-z]{2,6}$', 'message' => '*Пример заполнения почты MyEmail@myssite.ru'],
            [['password'], 'match', 'pattern' => '^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]$', 'message' => '*Пароль должен сожердать как минимум одну цифру, одну заглавную и одну строчную английскую букву'],
            [['password', 'password_repeat'], 'string', 'min'=> 8, 'max' => 16, 'message' => '*Строка длиной от 8 до 16 символов'],
            ['password_repeat', 'compare', 'compareAttribute' => 'password', 'message' => '*Пароли не совпадают']
        ];
    }

    public function register(){
        $user = new User();
        $user->username = $this->username;
        $user->email = $this->email;
        $user->password = \Yii::$app->security->generatePasswordHash($this->password);

        if ($user->save()){
            return true;
        }

        \Yii::error("Пользователь не был зарегистрирован. ". VarDumper::dumpAsString($user->errors));
        return false;
    }

    public function attributeLabels()
    {
        return [
            'username' => 'Логин',
            'email' => 'Почта',
            'password' => 'Пароль',
            'password_repeat' => 'Повторите пароль',
        ];
    }
}