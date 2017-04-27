<?php

namespace app\modules\product\models\admin;

use Yii;

/**
 * This is the model class for table "product".
 *
 * @property string $product_id
 * @property string $product_title
 * @property string $product_capacity_hour
 * @property string $product_date
 * @property string $product_update
 * @property string $product_unit_id
 * @property string $product_price
 * @property string $product_category_id
 * @property string $product_weight
 * @property string $product_length
 * @property string $product_width
 * @property string $product_thickness
 * @property string $product_note
 * @property string $product_recipe_id
 * @property string $product_vendor_code 
 * @property integer $product_archiv 
 *
 * @property Calculation[] $calculations
 * @property File[] $files
 * @property Lp[] $lps
 * @property Loss[] $lpLosses
 * @property Op[] $ops
 * @property OtherExpenses[] $opOthers
 * @property Pap[] $paps
 * @property Papr[] $paprs
 * @property Parameter[] $paprParameters
 * @property Pm[] $pms
 * @property Material[] $pmMaterials
 * @property Pop[] $pops
 * @property Position[] $popPositions
 * @property Unit $productUnit
 * @property CategoryProduct $productCategory
 * @property Recipe $productRecipe
 * @property Sp[] $sps
 * @property Solution[] $spSolutions
 */
class Product extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'product';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['product_title', 'product_capacity_hour', 'product_date', 'product_update', 'product_unit_id'], 'required'],
            [['product_capacity_hour', 'product_unit_id', 'product_category_id', 'product_weight', 'product_length', 'product_width', 'product_thickness', 'product_recipe_id', 'product_archiv'], 'integer'],
            [['product_date', 'product_update'], 'safe'],
            [['product_price'], 'number'],
            [['product_title'], 'string', 'max' => 255],
            [['product_note'], 'safe'],
            [['product_vendor_code'], 'string', 'max' => 45],
            [['product_unit_id'], 'exist', 'skipOnError' => true, 'targetClass' => Unit::className(), 'targetAttribute' => ['product_unit_id' => 'unit_id']],
            [['product_category_id'], 'exist', 'skipOnError' => true, 'targetClass' => CategoryProduct::className(), 'targetAttribute' => ['product_category_id' => 'category_product_id']],
            [['product_recipe_id'], 'exist', 'skipOnError' => true, 'targetClass' => Recipe::className(), 'targetAttribute' => ['product_recipe_id' => 'recipe_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'product_id' => 'ID',
            'product_title' => 'Название',
            'product_capacity_hour' => 'Выработка в час',
            'product_date' => 'Дата создания',
            'product_update' => 'Дата редактирования',
            'product_unit_id' => 'Ед.учета',
            'product_price' => 'Цена прайсовая',
            'product_category_id' => 'Категория',
            'product_weight' => 'Вес учетной единицы, гр',
            'product_length' => 'Длина, мм',
            'product_width' => 'Ширина, мм',
            'product_thickness' => 'Толщина, мм',
            'product_note' => 'Примечание',
            'product_recipe_id' => 'Рецептура',
            'product_vendor_code' => 'Артикул',
            'product_archiv' => 'Архив',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCalculations() {
        return $this->hasMany(Calculation::className(), ['calculation_product_id' => 'product_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFiles() {
        return $this->hasMany(File::className(), ['file_product_id' => 'product_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLps() {
        return $this->hasMany(Lp::className(), ['lp_product_id' => 'product_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLpLosses() {
        return $this->hasMany(Loss::className(), ['loss_id' => 'lp_loss_id'])->viaTable('lp', ['lp_product_id' => 'product_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOps() {
        return $this->hasMany(Op::className(), ['op_product_id' => 'product_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOpOthers() {
        return $this->hasMany(OtherExpenses::className(), ['other_expenses_id' => 'op_other_id'])->viaTable('op', ['op_product_id' => 'product_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPaps() {
        return $this->hasMany(Pap::className(), ['pap_product_id' => 'product_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPaprs() {
        return $this->hasMany(Papr::className(), ['papr_product_id' => 'product_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPaprParameters() {
        return $this->hasMany(Parameter::className(), ['parameter_id' => 'papr_parameter_id'])->viaTable('papr', ['papr_product_id' => 'product_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPms() {
        return $this->hasMany(Pm::className(), ['pm_product_id' => 'product_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPmMaterials() {
        return $this->hasMany(Material::className(), ['material_id' => 'pm_material_id'])->viaTable('pm', ['pm_product_id' => 'product_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPops() {
        return $this->hasMany(Pop::className(), ['pop_product_id' => 'product_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPopPositions() {
        return $this->hasMany(Position::className(), ['position_id' => 'pop_position_id'])->viaTable('pop', ['pop_product_id' => 'product_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductUnit() {
        return $this->hasOne(Unit::className(), ['unit_id' => 'product_unit_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductCategory() {
        return $this->hasOne(CategoryProduct::className(), ['category_product_id' => 'product_category_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductRecipe() {
        return $this->hasOne(Recipe::className(), ['recipe_id' => 'product_recipe_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSps() {
        return $this->hasMany(Sp::className(), ['sp_product_id' => 'product_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSpSolutions() {
        return $this->hasMany(Solution::className(), ['solution_id' => 'sp_solution_id'])->viaTable('sp', ['sp_product_id' => 'product_id']);
    }

    /**
     * @inheritdoc
     * @return ProductQuery the active query used by this AR class.
     */
    public static function find() {
        return new ProductQuery(get_called_class());
    }

}