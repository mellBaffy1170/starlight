<?php

namespace app\modules\admin\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Lodges;

/**
 * LodgesSearch represents the model behind the search form of `app\models\Lodges`.
 */
class LodgesSearch extends Lodges
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'price', 'price_0_3', 'price_4_12', 'sleeping_places', 'add_places', 'terrace', 'fridge', 'tv', 'wi_fi', 'shower', 'dishes', 'children', 'pets'], 'integer'],
            [['title', 'main_image', 'lodge_plan', 'description'], 'safe'],
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
        $query = Lodges::find();

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
            'price' => $this->price,
            'price_0_3' => $this->price_0_3,
            'price_4_12' => $this->price_4_12,
            'sleeping_places' => $this->sleeping_places,
            'add_places' => $this->add_places,
            'terrace' => $this->terrace,
            'fridge' => $this->fridge,
            'tv' => $this->tv,
            'wi_fi' => $this->wi_fi,
            'shower' => $this->shower,
            'dishes' => $this->dishes,
            'children' => $this->children,
            'pets' => $this->pets,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'main_image', $this->main_image])
            ->andFilterWhere(['like', 'lodge_plan', $this->lodge_plan])
            ->andFilterWhere(['like', 'description', $this->description]);

        return $dataProvider;
    }
}
