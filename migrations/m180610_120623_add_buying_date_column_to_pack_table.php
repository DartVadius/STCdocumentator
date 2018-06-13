<?php

use yii\db\Migration;

/**
 * Handles adding buying_date to table `pack`.
 */
class m180610_120623_add_buying_date_column_to_pack_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('pack', 'buying_date', $this->date()->null());
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropColumn('pack', 'buying_date');
    }
}
