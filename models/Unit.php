<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "unit".
 *
 * @property string $unit_id
 * @property string $unit_title
 * @property string $unit_parent_id
 * @property string $unit_ratio
 *
 * @property Material[] $materials
 * @property Papr[] $paprs
 * @property Pm[] $pms
 * @property Product[] $products
 * @property Rp[] $rps
 */
class Unit extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'unit';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['unit_title', 'unit_ratio'], 'required'],
            [['unit_parent_id', 'unit_ratio'], 'integer'],
            [['unit_title'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'unit_id' => 'ID',
            'unit_title' => 'Название',
            'unit_parent_id' => 'ID родителя',
            'unit_ratio' => 'Коэффициент',
            'unit_parent_name' => 'Базовая единица',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMaterials() {
        return $this->hasMany(Material::className(), ['material_unit_id' => 'unit_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPaprs() {
        return $this->hasMany(Papr::className(), ['papr_unit_id' => 'unit_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPms() {
        return $this->hasMany(Pm::className(), ['pm_unit_id' => 'unit_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProducts() {
        return $this->hasMany(Product::className(), ['product_unit_id' => 'unit_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRps() {
        return $this->hasMany(Rp::className(), ['rp_unit_id' => 'unit_id']);
    }
    
    public function getParent() {
        $parent = $this->find()->where(['unit_parent_id' => 'unit_id'])->one();
        if (!empty($parent)) {
            return $parent;
        } else {
            return FALSE;
        }
    }

}
