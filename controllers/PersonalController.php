<?php

namespace app\controllers;

use app\models\GuestCard;
use app\models\GuestCardForm;
use app\models\PersonalForm;
use app\models\User;
use Yii;

class PersonalController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $currentId = User::findIdentity(Yii::$app->user->id)->id;
        $currentGuest = GuestCard::find()
            ->select('*')
            ->from('guest_card')
            ->where(['user_id' => $currentId])
            ->one();

        $model = new PersonalForm();
        $model->lastName = $currentGuest->last_name;
        $model->firstName = $currentGuest->first_name;
        $model->phoneNumber = $currentGuest->phone_number;
        $model->email_ = $currentGuest->email;

        if($model->load(Yii::$app->request->post()) && $model->updateGuestCard()){
            return $this->redirect(['index']);
        }

        return $this->render('index',[
            'model' => $model
        ]);

    }

    public function actionGuestcard(){
        $q = new User();
        \Yii::debug($q->haveGuestCard());
        if ($q->haveGuestCard()){
            return $this->render('index');
        }
        else{
            return $this->render('guestcard');
        }
    }

    public function  actionAddcard(){
        $currentUser = User::findIdentity(Yii::$app->user->id);
        $model = new GuestCardForm();
        if($model->load(Yii::$app->request->post()) && $model->addGuestCard($currentUser)){
            return $this->redirect(['index']);
        }
        return $this->render('guestcard',[
            'model' => $model
        ]);
    }

    public function actionHistory(){
        return $this->render('history');
    }

    public function actionInfo(){
        return $this->render('info');
    }

}
