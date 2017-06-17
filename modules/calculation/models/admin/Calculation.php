<?php

namespace app\modules\calculation\models\admin;

use Yii;
use app\modules\product\models\admin\Product;

/**
 * This is the model class for table "calculation".
 *
 * @property string $calculation_id
 * @property string $calculation_product_id
 * @property string $calculation_product_title
 * @property string $calculation_date
 * @property string $calculation_note
 * @property string $calculation_product_capacity_hour
 * @property string $calculation_weight
 * @property string $calculation_length
 * @property string $calculation_width
 * @property string $calculation_thickness
 * @property string $calculation_unit
 * @property string $calculation_materials_data
 * @property string $calculation_recipe_data
 * @property string $calculation_packs_data
 * @property string $calculation_positions_data
 * @property string $calculation_expenses_data
 * @property string $calculation_losses_data
 *
 * @property Product $calculationProduct
 */
class Calculation extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'calculation';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['calculation_product_id', 'calculation_product_capacity_hour', 'calculation_weight',], 'integer'],
            [['calculation_length', 'calculation_width', 'calculation_thickness', ], 'number'],
            [['calculation_product_title', 'calculation_date', 'calculation_product_capacity_hour'], 'required'],
            [['calculation_date', 'calculation_archive'], 'safe'],
            [['calculation_note', 'calculation_materials_data', 'calculation_recipe_data', 'calculation_packs_data', 'calculation_positions_data', 'calculation_expenses_data', 'calculation_losses_data'], 'string'],
            [['calculation_product_title', 'calculation_unit'], 'string', 'max' => 255],
            [['calculation_product_id'], 'exist', 'skipOnError' => true, 'targetClass' => Product::className(), 'targetAttribute' => ['calculation_product_id' => 'product_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'calculation_id' => 'Calculation ID',
            'calculation_product_id' => 'Calculation Product ID',
            'calculation_product_title' => 'Название',
            'calculation_date' => 'Дата создания',
            'calculation_note' => 'Примечание',
            'calculation_product_capacity_hour' => 'Выработка в час',
            'calculation_weight' => 'Вес, гр',
            'calculation_length' => 'Длина',
            'calculation_width' => 'Ширина',
            'calculation_thickness' => 'Толщина',
            'calculation_unit' => 'Учетная единица',
            'calculation_materials_data' => 'Calculation Materials Data',
            'calculation_recipe_data' => 'Calculation Recipe Data',
            'calculation_packs_data' => 'Calculation Packs Data',
            'calculation_positions_data' => 'Calculation Positions Data',
            'calculation_expenses_data' => 'Calculation Expenses Data',
            'calculation_losses_data' => 'Calculation Losses Data',
            'calculation_archive' => 'Архив',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCalculationProduct()
    {
        return $this->hasOne(Product::className(), ['product_id' => 'calculation_product_id']);
    }

    /**
     * @inheritdoc
     * @return CalculationQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CalculationQuery(get_called_class());
    }
}
