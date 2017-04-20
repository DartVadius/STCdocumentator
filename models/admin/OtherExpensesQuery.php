<?php

namespace app\models\admin;

/**
 * This is the ActiveQuery class for [[OtherExpenses]].
 *
 * @see OtherExpenses
 */
class OtherExpensesQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return OtherExpenses[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return OtherExpenses|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
