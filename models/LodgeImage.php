<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "lodge_image".
 *
 * @property int $id
 * @property int $lodge_id
 * @property string $image
 *
 * @property Lodges $lodge
 */
class LodgeImage extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'lodge_image';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['lodge_id', 'image'], 'required'],
            [['lodge_id'], 'integer'],
            [['image'], 'string', 'max' => 100],
            [['lodge_id'], 'exist', 'skipOnError' => true, 'targetClass' => Lodges::class, 'targetAttribute' => ['lodge_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'lodge_id' => 'Lodge ID',
            'image' => 'Image',
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
}
