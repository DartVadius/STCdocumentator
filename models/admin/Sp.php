<?php

namespace app\models\admin;

use Yii;

/**
 * This is the model class for table "sp".
 *
 * @property string $sp_id
 * @property string $sp_solution_id
 * @property string $sp_product_id
 *
 * @property Solution $spSolution
 * @property Product $spProduct
 */
class Sp extends \yii\db\ActiveRecord {

    public $sp_solution_ids;

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'sp';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['sp_solution_id', 'sp_product_id'], 'required'],
            [['sp_solution_id', 'sp_product_id'], 'integer'],
            ['sp_solution_ids', 'each', 'rule' => ['integer']],
            [['sp_solution_id', 'sp_product_id'], 'unique', 'targetAttribute' => ['sp_solution_id', 'sp_product_id'], 'message' => 'The combination of Sp Solution ID and Sp Product ID has already been taken.'],
            [['sp_solution_id'], 'exist', 'skipOnError' => true, 'targetClass' => Solution::className(), 'targetAttribute' => ['sp_solution_id' => 'solution_id']],
            [['sp_product_id'], 'exist', 'skipOnError' => true, 'targetClass' => Product::className(), 'targetAttribute' => ['sp_product_id' => 'product_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'sp_id' => 'ID',
            'sp_solution_id' => 'Решение',
            'sp_product_id' => 'Продукт',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSpSolution() {
        return $this->hasOne(Solution::className(), ['solution_id' => 'sp_solution_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSpProduct() {
        return $this->hasOne(Product::className(), ['product_id' => 'sp_product_id']);
    }

    /**
     * @inheritdoc
     * @return SpQuery the active query used by this AR class.
     */
    public static function find() {
        return new SpQuery(get_called_class());
    }

    /**
     * get list of solutions IDs connected to this product
     */
    public function getSolutionIds() {
        $this->sp_solution_ids = (array)$this->find()->select('sp_solution_id')->where(['sp_product_id' => $this->sp_product_id])->column();
    }
    
    /**
     * save/update list of solutions IDs connected to this product
     * 
     * @return boolean
     */
    public function saveSps() {
        $this->deleteAll(['sp_product_id' => $this->sp_product_id]);
        if ($this->sp_solution_ids != NULL) {
            foreach ($this->sp_solution_ids as $sp_id) {
                $model = new Sp();
                $model->sp_solution_id = $sp_id;
                $model->sp_product_id = $this->sp_product_id;
                $model->save();
            }
        }
        
        return TRUE;
    }
}
