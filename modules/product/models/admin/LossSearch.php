<?php

namespace app\modules\product\models\admin;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\product\models\admin\Loss;

/**
 * LossSearch represents the model behind the search form about `app\models\admin\Loss`.
 */
class LossSearch extends Loss
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['loss_id'], 'integer'],
            [['loss_title', 'loss_desc'], 'safe'],
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
        $query = Loss::find();

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
            'loss_id' => $this->loss_id,
        ]);

        $query->andFilterWhere(['like', 'loss_title', $this->loss_title])
            ->andFilterWhere(['like', 'loss_desc', $this->loss_desc]);

        return $dataProvider;
    }
}
