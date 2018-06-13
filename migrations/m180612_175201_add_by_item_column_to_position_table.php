<?php

use yii\db\Migration;

/**
 * Handles adding by_item to table `position`.
 */
class m180612_175201_add_by_item_column_to_position_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('position', 'by_item', $this->integer()->defaultValue(0));
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropColumn('position', 'by_item');
    }
}
