<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "review".
 *
 * @property int $id
 * @property int $user_id
 * @property int $lodge_id
 * @property string $content
 * @property int $rating
 *
 * @property Lodges $lodge
 * @property User $user
 */
class Review extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'review';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'lodge_id', 'content', 'rating'], 'required'],
            [['user_id', 'lodge_id', 'rating'], 'integer'],
            [['content'], 'string', 'max' => 1000],
            [['lodge_id'], 'exist', 'skipOnError' => true, 'targetClass' => Lodges::class, 'targetAttribute' => ['lodge_id' => 'id']],
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
            'lodge_id' => 'Lodge ID',
            'content' => 'Content',
            'rating' => 'Rating',
        ];
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
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }
}
