<?php

namespace app\models\admin;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\admin\Mr;

/**
 * MrSearch represents the model behind the search form about `app\models\Mr`.
 */
class MrSearch extends Mr
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['mr_id', 'mr_recipe_id', 'mr_material_id'], 'integer'],
            [['mr_percentage'], 'number'],
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
        $query = Mr::find()->with(['mrRecipe', 'mrMaterial']);

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
            'mr_id' => $this->mr_id,
            'mr_percentage' => $this->mr_percentage,
            'mr_recipe_id' => $this->mr_recipe_id,
            'mr_material_id' => $this->mr_material_id,
        ]);

        return $dataProvider;
    }
}
