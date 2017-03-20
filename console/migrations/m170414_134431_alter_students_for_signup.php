<?php

use yii\db\Schema;
use yii\db\Migration;

class m170414_134431_alter_students_for_signup extends Migration
{
    public function up()
    {
        $this->alterColumn('student', 'degree_id', 'int(11) unsigned null');
        $this->alterColumn('student', 'country_id', 'int(11) unsigned null');
        $this->alterColumn('student', 'university_id', 'int(11) unsigned null');
        $this->alterColumn('student', 'student_dob', 'date null');
        $this->alterColumn('student', 'student_enrolment_year', 'year(4) null');
        $this->alterColumn('student', 'student_graduating_year', 'year(4) null');
        $this->alterColumn('student', 'student_gpa', 'decimal(10,2) null');
        $this->alterColumn('student', 'student_english_level', 'tinyint(4) null');
        $this->alterColumn('student', 'student_gender', 'tinyint(4) null');
        $this->alterColumn('student', 'student_contact_number', 'varchar(64) null');
        $this->alterColumn('student', 'student_email_preference', 'tinyint(4) null');
    }

    public function down()
    {
    	$this->alterColumn('student', 'degree_id', 'int(11) unsigned');
        $this->alterColumn('student', 'country_id', 'int(11) unsigned');
        $this->alterColumn('student', 'university_id', 'int(11) unsigned');
        $this->alterColumn('student', 'student_dob', 'date');
        $this->alterColumn('student', 'student_enrolment_year', 'year(4)');
        $this->alterColumn('student', 'student_graduating_year', 'year(4)');
        $this->alterColumn('student', 'student_gpa', 'decimal(10,2)');
        $this->alterColumn('student', 'student_english_level', 'tinyint(4)');
        $this->alterColumn('student', 'student_gender', 'tinyint(4)');
        $this->alterColumn('student', 'student_contact_number', 'varchar(64)');
        $this->alterColumn('student', 'student_email_preference', 'tinyint(4)');
    }

}
