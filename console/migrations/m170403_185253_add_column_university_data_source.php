<?php

use yii\db\Migration;

class m170403_185253_add_column_university_data_source extends Migration
{
    public function up()
    {
        $this->addColumn('university', 'university_data_source', "tinyint NOT NULL DEFAULT '0' COMMENT 'student (1), admin (0) '");
    }

    public function down()
    {
        $this->dropColumn('university', 'university_data_source');
    }
}
