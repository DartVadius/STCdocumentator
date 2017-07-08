<?php

namespace app\modules\product\models\admin;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\product\models\admin\Pma;

/**
 * PmaSearch represents the model behind the search form about `app\modules\product\models\admin\Pma`.
 */
class PmaSearch extends Pma
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pma_id', 'pma_product_id', 'pma_material_id', 'pma_unit_id', 'pma_brutto'], 'integer'],
            [['pma_quantity', 'pma_loss'], 'number'],
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
        $query = Pma::find();

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
            'pma_id' => $this->pma_id,
            'pma_product_id' => $this->pma_product_id,
            'pma_material_id' => $this->pma_material_id,
            'pma_quantity' => $this->pma_quantity,
            'pma_unit_id' => $this->pma_unit_id,
            'pma_loss' => $this->pma_loss,
            'pma_brutto' => $this->pma_brutto
        ]);

        return $dataProvider;
    }
}
