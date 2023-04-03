<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "booking".
 *
 * @property int $id
 * @property int $guest_card_id
 * @property int $lodge_id
 * @property int $status_id
 * @property string $date
 * @property int $total_cost
 * @property string $start_date
 * @property string $end_date
 * @property int $number_of_persons
 *
 * @property GuestCard $guestCard
 * @property Lodges $lodge
 * @property Status $status
 */
class Booking extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'booking';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['guest_card_id', 'lodge_id', 'status_id', 'date', 'total_cost', 'start_date', 'end_date', 'number_of_persons'], 'required'],
            [['guest_card_id', 'lodge_id', 'status_id', 'total_cost', 'number_of_persons'], 'integer'],
            [['date', 'start_date', 'end_date'], 'safe'],
            [['guest_card_id'], 'exist', 'skipOnError' => true, 'targetClass' => GuestCard::class, 'targetAttribute' => ['guest_card_id' => 'id']],
            [['lodge_id'], 'exist', 'skipOnError' => true, 'targetClass' => Lodges::class, 'targetAttribute' => ['lodge_id' => 'id']],
            [['status_id'], 'exist', 'skipOnError' => true, 'targetClass' => Status::class, 'targetAttribute' => ['status_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'guest_card_id' => 'Guest Card ID',
            'lodge_id' => 'Lodge ID',
            'status_id' => 'Status ID',
            'date' => 'Date',
            'total_cost' => 'Total Cost',
            'start_date' => 'Start Date',
            'end_date' => 'End Date',
            'number_of_persons' => 'Number Of Persons',
        ];
    }

    /**
     * Gets query for [[GuestCard]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getGuestCard()
    {
        return $this->hasOne(GuestCard::class, ['id' => 'guest_card_id']);
    }

    /**
     * Gets query for [[Lodge]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLodge()
    {
        return $this->hasOne(Lodges::class, ['id' => 'lodge_id']);
    }

    /**
     * Gets query for [[Status]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStatus()
    {
        return $this->hasOne(Status::class, ['id' => 'status_id']);
    }
}
