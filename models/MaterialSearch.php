<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Material;

/**
 * MaterialSearch represents the model behind the search form about `app\models\Material`.
 */
class MaterialSearch extends Material
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['material_id', 'material_catrgory_id', 'material_unit_id'], 'integer'],
            [['material_title', 'material_article'], 'safe'],
            [['materil_price'], 'number'],
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
        $query = Material::find();

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
            'material_id' => $this->material_id,
            'materil_price' => $this->materil_price,
            'material_catrgory_id' => $this->material_catrgory_id,
            'material_unit_id' => $this->material_unit_id,
        ]);

        $query->andFilterWhere(['like', 'material_title', $this->material_title])
            ->andFilterWhere(['like', 'material_article', $this->material_article]);

        return $dataProvider;
    }
}