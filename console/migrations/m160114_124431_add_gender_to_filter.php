<?php

use yii\db\Schema;
use yii\db\Migration;

class m160114_124431_add_gender_to_filter extends Migration
{
    public function up()
    {
        $this->addColumn('filter', 'filter_gender', $this->smallInteger());
    }

    public function down()
    {
        $this->dropColumn('filter', 'filter_gender');
    }

}
