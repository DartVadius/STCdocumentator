<?php

use yii\db\Migration;

/**
 * Handles adding quantity_by_hour to table `recipe`.
 */
class m180612_173039_add_quantity_by_hour_column_to_recipe_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('recipe', 'quantity_by_hour', $this->decimal(3)->notNull());
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropColumn('recipe', 'quantity_by_hour');
    }
}
