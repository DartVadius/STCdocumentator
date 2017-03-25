<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\OtherExpenses;

/**
 * OtherExpensesSearch represents the model behind the search form about `app\models\OtherExpenses`.
 */
class OtherExpensesSearch extends OtherExpenses
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['other_expenses_id'], 'integer'],
            [['other_expenses_title', 'other_expenses_desc'], 'safe'],
            [['other_expenses_costs_hour'], 'number'],
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
        $query = OtherExpenses::find();

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
            'other_expenses_id' => $this->other_expenses_id,
            'other_expenses_costs_hour' => $this->other_expenses_costs_hour,
        ]);

        $query->andFilterWhere(['like', 'other_expenses_title', $this->other_expenses_title])
            ->andFilterWhere(['like', 'other_expenses_desc', $this->other_expenses_desc]);

        return $dataProvider;
    }
}
