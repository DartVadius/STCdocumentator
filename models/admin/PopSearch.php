<?php

namespace app\models\admin;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\admin\Pop;

/**
 * PopSearch represents the model behind the search form about `app\models\admin\Pop`.
 */
class PopSearch extends Pop
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pop_id', 'pop_position_id', 'pop_product_id'], 'integer'],
            [['pop_num'], 'number'],
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
        $query = Pop::find();

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
            'pop_id' => $this->pop_id,
            'pop_position_id' => $this->pop_position_id,
            'pop_product_id' => $this->pop_product_id,
            'pop_num' => $this->pop_num,
        ]);

        return $dataProvider;
    }
}
