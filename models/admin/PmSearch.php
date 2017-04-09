<?php

namespace app\models\admin;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\admin\Pm;

/**
 * PmSearch represents the model behind the search form about `app\models\admin\Pm`.
 */
class PmSearch extends Pm
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pm_id', 'pm_product_id', 'pm_material_id', 'pm_unit_id', 'pm_square'], 'integer'],
            [['pm_quantity'], 'number'],
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
        $query = Pm::find()->with('pmProduct', 'pmMaterial', 'pmUnit');

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
            'pm_id' => $this->pm_id,
            'pm_product_id' => $this->pm_product_id,
            'pm_material_id' => $this->pm_material_id,
            'pm_quantity' => $this->pm_quantity,
            'pm_unit_id' => $this->pm_unit_id,
            'pm_square' => $this->pm_square,
        ]);

        return $dataProvider;
    }
}
