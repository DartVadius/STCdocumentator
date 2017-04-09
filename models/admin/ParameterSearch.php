<?php

namespace app\models\admin;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\admin\Parameter;

/**
 * ParameterSearch represents the model behind the search form about `app\models\Parameter`.
 */
class ParameterSearch extends Parameter
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['parameter_id'], 'integer'],
            [['parameter_title', 'parameter_desc'], 'safe'],
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
        $query = Parameter::find();

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
            'parameter_id' => $this->parameter_id,
        ]);

        $query->andFilterWhere(['like', 'parameter_title', $this->parameter_title])
            ->andFilterWhere(['like', 'parameter_desc', $this->parameter_desc]);

        return $dataProvider;
    }
}
