<?php

namespace app\modules\product\models\admin;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\product\models\admin\Op;

/**
 * OpSearch represents the model behind the search form about `app\models\admin\Op`.
 */
class OpSearch extends Op
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['op_id', 'op_other_id', 'op_product_id'], 'integer'],
            [['op_cost_hour'], 'number'],
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
        $query = Op::find();

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
            'op_id' => $this->op_id,
            'op_other_id' => $this->op_other_id,
            'op_product_id' => $this->op_product_id,
            'op_cost_hour' => $this->op_cost_hour,
        ]);

        return $dataProvider;
    }
}
