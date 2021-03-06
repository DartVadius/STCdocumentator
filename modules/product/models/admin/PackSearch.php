<?php

namespace app\modules\product\models\admin;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\product\models\admin\Pack;

/**
 * PackSearch represents the model behind the search form about `app\models\admin\Pack`.
 */
class PackSearch extends Pack {

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['pack_id', 'pack_category_id'], 'integer'],
            [['pack_title', 'pack_desc'], 'safe'],
            [['pack_price', 'pack_weight'], 'number'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios() {
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
    public function search($params) {
        $query = Pack::find()->with(['packCategory']);

        $pageSize = \app\modules\classes\MyFunctions::setPageSize();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => $pageSize,
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
            'pack_id' => $this->pack_id,
            'pack_price' => $this->pack_price,
            'pack_category_id' => $this->pack_category_id,
        ]);

        $query->andFilterWhere(['like', 'pack_title', $this->pack_title])
                ->andFilterWhere(['like', 'pack_desc', $this->pack_desc]);

        return $dataProvider;
    }

}
