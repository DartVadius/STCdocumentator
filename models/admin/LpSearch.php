<?php

namespace app\models\admin;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\admin\Lp;

/**
 * LpSearch represents the model behind the search form about `app\models\admin\Lp`.
 */
class LpSearch extends Lp
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['lp_id', 'lp_loss_id', 'lp_product_id'], 'integer'],
            [['lp_percentage'], 'number'],
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
        $query = Lp::find();

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
            'lp_id' => $this->lp_id,
            'lp_loss_id' => $this->lp_loss_id,
            'lp_product_id' => $this->lp_product_id,
            'lp_percentage' => $this->lp_percentage,
        ]);

        return $dataProvider;
    }
}
