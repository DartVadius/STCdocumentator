<?php

namespace app\modules\product\models\admin;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\product\models\admin\CategoryProduct;

/**
 * CategoryProductSearch represents the model behind the search form about `app\models\CategoryProduct`.
 */
class CategoryProductSearch extends CategoryProduct
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['category_product_id'], 'integer'],
            [['category_product_title', 'category_product_desc', 'category_product_img'], 'safe'],
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
        $query = CategoryProduct::find();

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
            'category_product_id' => $this->category_product_id,
        ]);

        $query->andFilterWhere(['like', 'category_product_title', $this->category_product_title])
            ->andFilterWhere(['like', 'category_product_desc', $this->category_product_desc])
            ->andFilterWhere(['like', 'category_product_img', $this->category_product_img]);

        return $dataProvider;
    }
}
