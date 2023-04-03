<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "guest_card".
 *
 * @property int $id
 * @property int|null $user_id
 * @property string $last_name
 * @property string $first_name
 * @property string $phone_number
 * @property string $email
 *
 * @property Booking[] $bookings
 * @property User $user
 */
class GuestCard extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'guest_card';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id'], 'integer'],
            [['last_name', 'first_name', 'phone_number', 'email'], 'required'],
            [['last_name', 'first_name', 'email'], 'string', 'max' => 100],
            [['phone_number'], 'string', 'max' => 13],
            [['email'], 'unique'],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'last_name' => 'Last Name',
            'first_name' => 'First Name',
            'phone_number' => 'Phone Number',
            'email' => 'Email',
        ];
    }

    /**
     * Gets query for [[Bookings]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBookings()
    {
        return $this->hasMany(Booking::class, ['guest_card_id' => 'id']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }
}
