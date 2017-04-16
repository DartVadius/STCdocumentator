<?php

namespace app\models\admin;

/**
 * This is the ActiveQuery class for [[Recipe]].
 *
 * @see Recipe
 */
class RecipeQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Recipe[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Recipe|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}