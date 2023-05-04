<?php

namespace app\controllers;

use app\models\GuestCard;
use app\models\GuestCardForm;
use app\models\PersonalForm;
use app\models\ReviewForm;
use app\models\User;
use Yii;

class PersonalController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $q = new User();
        $flag = $q->haveGuestCard();

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

        if ($flag){
            return $this->render('index',[
                'model' => $model
            ]);
        }
        else{
            $model = new GuestCardForm();
            return $this->render('guestcard', [
                'model' => $model,
            ]);
        }

    }

    public function actionGuestcard(){

            return $this->render('guestcard');

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

    public function actionAddreview($lodge_id, $booking_id){
        $model = new ReviewForm();

        if($model->load(Yii::$app->request->post()) && $model->addReview($lodge_id, $booking_id)){
            return $this->redirect(['main/review']);
        }

        return $this->render('addreview',[
            'model' => $model
        ]);
    }

}
