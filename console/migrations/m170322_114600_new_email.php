<?php

use yii\db\Migration;

class m170322_114600_new_email extends Migration
{
    public function up()
    {
        $this->addColumn('employer', 'employer_new_email', $this->string(255)->after('employer_email'));

        $this->addColumn('student', 'student_new_email', $this->string(255)->after('student_email'));
    }

    public function down()
    {
        
    }
}
