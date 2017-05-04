<?php

namespace app\modules\calculation\models\admin;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\calculation\models\admin\Calculation;

/**
 * CalculationSearch represents the model behind the search form about `app\modules\calculation\models\admin\Calculation`.
 */
class CalculationSearch extends Calculation
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['calculation_id', 'calculation_product_id', 'calculation_product_capacity_hour', 'calculation_weight', 'calculation_length', 'calculation_width', 'calculation_thickness', 'calculation_archive'], 'integer'],
            [['calculation_product_title', 'calculation_date', 'calculation_note', 'calculation_unit', 'calculation_materials_data', 'calculation_recipe_data', 'calculation_packs_data', 'calculation_positions_data', 'calculation_expenses_data', 'calculation_losses_data'], 'safe'],
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
        $query = Calculation::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 20,
            ],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'calculation_id' => $this->calculation_id,
            'calculation_product_id' => $this->calculation_product_id,
            'calculation_date' => $this->calculation_date,
            'calculation_product_capacity_hour' => $this->calculation_product_capacity_hour,
            'calculation_weight' => $this->calculation_weight,
            'calculation_length' => $this->calculation_length,
            'calculation_width' => $this->calculation_width,
            'calculation_thickness' => $this->calculation_thickness,
            'calculation_archive' => $this->calculation_archive,
        ]);

        $query->andFilterWhere(['like', 'calculation_product_title', $this->calculation_product_title])
            ->andFilterWhere(['like', 'calculation_note', $this->calculation_note])
            ->andFilterWhere(['like', 'calculation_unit', $this->calculation_unit])
            ->andFilterWhere(['like', 'calculation_materials_data', $this->calculation_materials_data])
            ->andFilterWhere(['like', 'calculation_recipe_data', $this->calculation_recipe_data])
            ->andFilterWhere(['like', 'calculation_packs_data', $this->calculation_packs_data])
            ->andFilterWhere(['like', 'calculation_positions_data', $this->calculation_positions_data])
            ->andFilterWhere(['like', 'calculation_expenses_data', $this->calculation_expenses_data])
            ->andFilterWhere(['like', 'calculation_losses_data', $this->calculation_losses_data]);

        return $dataProvider;
    }
}
