<?php

namespace app\modules\product\models\admin;

use Yii;

/**
 * This is the model class for table "material".
 *
 * @property string $material_id
 * @property string $material_title
 * @property string $material_price
 * @property string $material_article
 * @property string $material_category_id
 * @property string $material_unit_id
 * @property string $material_currency_type
 * @property string $material_delivery
 *
 * @property Category $materialCategory
 * @property Currency $materialCurrencyType
 * @property Unit $materialUnit
 * @property Mr[] $mrs
 * @property Recipe[] $mrRecipes
 * @property Pm[] $pms
 * @property Product[] $pmProducts
 * @property Pma[] $pmas
 * @property Product[] $pmaProducts
 */
class Material extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'material';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['material_title', 'material_price', 'material_unit_id'], 'required'],
            [['material_price', 'material_delivery'], 'number'],
            [['buying_date'], 'date', 'format' => 'yyyy-mm-dd'],
            [['material_category_id', 'material_unit_id', 'material_currency_type'], 'integer'],
            [['material_title'], 'string', 'max' => 255],
            [['material_article'], 'string', 'max' => 12],
            [['material_category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['material_category_id' => 'category_id']],
            [['material_currency_type'], 'exist', 'skipOnError' => true, 'targetClass' => Currency::className(), 'targetAttribute' => ['material_currency_type' => 'currency_id']],
            [['material_unit_id'], 'exist', 'skipOnError' => true, 'targetClass' => Unit::className(), 'targetAttribute' => ['material_unit_id' => 'unit_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'material_id' => 'ID',
            'material_title' => 'Название',
            'material_price' => 'Цена',
            'material_article' => 'Артикул',
            'material_category_id' => 'Категория',
            'material_unit_id' => 'Ед.изм.',
            'material_currency_type' => 'Валюта',
            'material_delivery' => 'Доставка',
            'buying_date' => 'Дата закупки',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMaterialCategory()
    {
        return $this->hasOne(Category::className(), ['category_id' => 'material_category_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMaterialCurrencyType()
    {
        return $this->hasOne(Currency::className(), ['currency_id' => 'material_currency_type']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMaterialUnit()
    {
        return $this->hasOne(Unit::className(), ['unit_id' => 'material_unit_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMrs()
    {
        return $this->hasMany(Mr::className(), ['mr_material_id' => 'material_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMrRecipes()
    {
        return $this->hasMany(Recipe::className(), ['recipe_id' => 'mr_recipe_id'])->viaTable('mr', ['mr_material_id' => 'material_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPms()
    {
        return $this->hasMany(Pm::className(), ['pm_material_id' => 'material_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPmProducts()
    {
        return $this->hasMany(Product::className(), ['product_id' => 'pm_product_id'])->viaTable('pm', ['pm_material_id' => 'material_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPmas()
    {
        return $this->hasMany(Pma::className(), ['pma_material_id' => 'material_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPmaProducts()
    {
        return $this->hasMany(Product::className(), ['product_id' => 'pma_product_id'])->viaTable('pma', ['pma_material_id' => 'material_id']);
    }

    /**
     * @inheritdoc
     * @return MaterialQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new MaterialQuery(get_called_class());
    }
}
