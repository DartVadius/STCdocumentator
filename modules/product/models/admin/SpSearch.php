<?php

namespace app\modules\product\models\admin;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\product\models\admin\Sp;

/**
 * SpSearch represents the model behind the search form about `app\models\admin\Sp`.
 */
class SpSearch extends Sp
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sp_id', 'sp_solution_id', 'sp_product_id'], 'integer'],
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
        $query = Sp::find();

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
            'sp_id' => $this->sp_id,
            'sp_solution_id' => $this->sp_solution_id,
            'sp_product_id' => $this->sp_product_id,
        ]);

        return $dataProvider;
    }
}
