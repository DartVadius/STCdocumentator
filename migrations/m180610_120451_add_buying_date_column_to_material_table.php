<?php

use yii\db\Migration;

/**
 * Handles adding buying_date to table `material`.
 */
class m180610_120451_add_buying_date_column_to_material_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('material', 'buying_date', $this->date()->null());
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropColumn('material', 'buying_date');
    }
}
