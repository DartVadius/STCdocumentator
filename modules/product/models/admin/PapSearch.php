<?php

namespace app\modules\product\models\admin;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\product\models\admin\Pap;

/**
 * PapSearch represents the model behind the search form about `app\models\admin\Pap`.
 */
class PapSearch extends Pap
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pap_id', 'pap_pack_id', 'pap_product_id'], 'integer'],
            [['pap_capacity'], 'number'],
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
        $query = Pap::find()->with(['papPack', 'papProduct']);

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
            'pap_id' => $this->pap_id,
            'pap_pack_id' => $this->pap_pack_id,
            'pap_product_id' => $this->pap_product_id,
            'pap_capacity' => $this->pap_capacity,
        ]);

        return $dataProvider;
    }
}
