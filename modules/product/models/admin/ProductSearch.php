<?php

namespace app\modules\product\models\admin;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\product\models\admin\Product;

/**
 * ProductSearch represents the model behind the search form about `app\models\admin\Product`.
 */
class ProductSearch extends Product
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_id', 'product_capacity_hour', 'product_unit_id', 'product_category_id', 'product_weight', 'product_length', 'product_width', 'product_thickness', 'product_recipe_id', 'product_archiv'], 'integer'],
            [['product_title', 'product_date', 'product_update', 'product_note', 'product_vendor_code'], 'safe'],
            [['product_price'], 'number'],
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
        $query = Product::find()->with(['productCategory']);

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
            'product_id' => $this->product_id,
            'product_capacity_hour' => $this->product_capacity_hour,
            'product_date' => $this->product_date,
            'product_update' => $this->product_update,
            'product_unit_id' => $this->product_unit_id,
            'product_price' => $this->product_price,
            'product_category_id' => $this->product_category_id,
            'product_weight' => $this->product_weight,
            'product_length' => $this->product_length,
            'product_width' => $this->product_width,
            'product_thickness' => $this->product_thickness,
            'product_recipe_id' => $this->product_recipe_id,
            'product_archiv' => $this->product_archiv,
        ]);

        $query->andFilterWhere(['like', 'product_title', $this->product_title])
            ->andFilterWhere(['like', 'product_note', $this->product_note])
            ->andFilterWhere(['like', 'product_vendor_code', $this->product_vendor_code]);

        return $dataProvider;
    }
}
