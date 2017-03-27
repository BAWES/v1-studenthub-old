<?php

use yii\db\Schema;
use yii\db\Migration;

class m170322_114500_student_cv_photo_to_null extends Migration
{
    public function up()
    {
        $this->alterColumn('student', 'student_photo', 'varchar(255) NULL');
        $this->alterColumn('student', 'student_cv', 'varchar(255) NULL');
    }

    public function down()
    {
    	$this->alterColumn('student', 'student_photo', "varchar(255) NULL DEFAULT ''");
        $this->alterColumn('student', 'student_cv', "varchar(255) NULL DEFAULT ''");
    }

}
