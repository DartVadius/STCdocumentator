<?php

namespace app\modules\calculation\models\admin;

/**
 * This is the ActiveQuery class for [[Calculation]].
 *
 * @see Calculation
 */
class CalculationQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Calculation[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Calculation|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
