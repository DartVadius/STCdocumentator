<?php

namespace app\modules\product\models\admin;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\product\models\admin\Solution;

/**
 * SolutionSearch represents the model behind the search form about `app\models\Solution`.
 */
class SolutionSearch extends Solution
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['solution_id'], 'integer'],
            [['solution_title', 'solution_desc'], 'safe'],
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
        $query = Solution::find();

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
            'solution_id' => $this->solution_id,
        ]);

        $query->andFilterWhere(['like', 'solution_title', $this->solution_title])
            ->andFilterWhere(['like', 'solution_desc', $this->solution_desc]);

        return $dataProvider;
    }
}
