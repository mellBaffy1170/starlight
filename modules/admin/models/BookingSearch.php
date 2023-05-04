<?php

namespace app\modules\admin\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Booking;

/**
 * BookingSearch represents the model behind the search form of `app\models\Booking`.
 */
class BookingSearch extends Booking
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'guest_card_id', 'lodge_id', 'status_id', 'total_cost', 'number_of_persons', 'number_of_kids'], 'integer'],
            [['date', 'start_date', 'end_date'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Booking::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'guest_card_id' => $this->guest_card_id,
            'lodge_id' => $this->lodge_id,
            'status_id' => $this->status_id,
            'date' => $this->date,
            'total_cost' => $this->total_cost,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'number_of_persons' => $this->number_of_persons,
            'number_of_kids' => $this->number_of_kids,
        ]);

        return $dataProvider;
    }
}
