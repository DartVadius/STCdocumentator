<?php

namespace app\models\admin;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\admin\Pack;

/**
 * PackSearch represents the model behind the search form about `app\models\Pack`.
 */
class PackSearch extends Pack
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pack_id'], 'integer'],
            [['pack_title', 'pack_desc'], 'safe'],
            [['pack_price'], 'number'],
        ];
    }

    /**
     * @inheritdoc
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
        $query = Pack::find();

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
            'pack_id' => $this->pack_id,
            'pack_price' => $this->pack_price,
        ]);

        $query->andFilterWhere(['like', 'pack_title', $this->pack_title])
            ->andFilterWhere(['like', 'pack_desc', $this->pack_desc]);

        return $dataProvider;
    }
}
