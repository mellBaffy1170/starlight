<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "lodges".
 *
 * @property int $id
 * @property string $title
 * @property string $main_image
 * @property string $lodge_plan
 * @property string $description
 * @property int $price
 * @property int $price_0_3
 * @property int $price_4_12
 * @property int $sleeping_places
 * @property int $add_places
 * @property int $terrace 0-false, 1-true
 * @property int $fridge 0-false, 1-true
 * @property int $tv 0-false, 1-true
 * @property int $wi_fi 0-false, 1-true
 * @property int $shower 0-false, 1-true
 * @property int $dishes 0-false, 1-true
 * @property int $children 0-false, 1-true
 * @property int $pets 0-false, 1-true
 *
 * @property Booking[] $bookings
 * @property LodgeImage[] $lodgeImages
 * @property Review[] $reviews
 */
class Lodges extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'lodges';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'main_image', 'lodge_plan', 'description', 'price', 'price_0_3', 'price_4_12', 'sleeping_places', 'add_places', 'terrace', 'fridge', 'tv', 'wi_fi', 'shower', 'dishes', 'children', 'pets'], 'required'],
            [['price', 'price_0_3', 'price_4_12', 'sleeping_places', 'add_places', 'terrace', 'fridge', 'tv', 'wi_fi', 'shower', 'dishes', 'children', 'pets'], 'integer'],
            [['title', 'main_image', 'lodge_plan'], 'string', 'max' => 100],
            [['description'], 'string', 'max' => 10000],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'main_image' => 'Main Image',
            'lodge_plan' => 'Lodge Plan',
            'description' => 'Description',
            'price' => 'Price',
            'price_0_3' => 'Price 0 3',
            'price_4_12' => 'Price 4 12',
            'sleeping_places' => 'Sleeping Places',
            'add_places' => 'Add Places',
            'terrace' => 'Terrace',
            'fridge' => 'Fridge',
            'tv' => 'Tv',
            'wi_fi' => 'Wi Fi',
            'shower' => 'Shower',
            'dishes' => 'Dishes',
            'children' => 'Children',
            'pets' => 'Pets',
        ];
    }

    /**
     * Gets query for [[Bookings]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBookings()
    {
        return $this->hasMany(Booking::class, ['lodge_id' => 'id']);
    }

    /**
     * Gets query for [[LodgeImages]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLodgeImages()
    {
        return $this->hasMany(LodgeImage::class, ['lodge_id' => 'id']);
    }

    /**
     * Gets query for [[Reviews]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getReviews()
    {
        return $this->hasMany(Review::class, ['lodge_id' => 'id']);
    }

    public static function getAll()
    {
        return Lodges::find()->all();
    }
}
