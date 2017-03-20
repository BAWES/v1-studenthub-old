<?php

use yii\db\Migration;

class m170317_145040_job_refactor extends Migration
{
    public function up()
    {        
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->dropForeignKey('job_ibfk_3', 'job');

        $this->dropColumn('job', 'filter_id');
        $this->dropColumn('job', 'job_question_1');
        $this->dropColumn('job', 'job_question_2');
        $this->dropColumn('job', 'job_price_per_applicant');
        
        $this->dropColumn('job', 'job_broadcasted');
        $this->dropColumn('job', 'job_desired_skill');

        $this->dropColumn('student_job_application', 'application_answer_1');
        $this->dropColumn('student_job_application', 'application_answer_2');

        $this->addColumn('job', 'salary', $this->decimal(10, 3));
        $this->addColumn('job', 'salary_currency', $this->string(10));

        $this->createTable('{{%skill}}', [
            'skill_id' => $this->primaryKey(11),
            'skill_en' => $this->string(50)->notNull(),
            'skill_ar' => $this->string(50)->notNull(),
            'skill_created_at' => $this->datetime(),
            'skill_updated_at' => $this->datetime()
        ], $tableOptions);

        $this->createTable('{{%job_skill}}', [
            'job_skill_id' => $this->primaryKey(11),
            'job_id' => $this->integer(11) .' UNSIGNED NULL',
            'skill_id' => $this->integer(11)
        ], $tableOptions);

        $this->createIndex ('ind-job_skill-job_id', '{{%job_skill}}', 'job_id');

        $this->addForeignKey ('fk-job_skill-job_id', '{{%job_skill}}', 'job_id', '{{%job}}', 'job_id', 'SET NULL' , 'SET NULL');

        $this->createIndex ('ind-job_skill-skill_id', '{{%job_skill}}', 'skill_id');

        $this->addForeignKey ('fk-job_skill-skill_id', '{{%job_skill}}', 'skill_id', '{{%skill}}', 'skill_id', 'SET NULL' , 'SET NULL');

        $this->createTable('{{%job_question}}', [
            'job_question_id' => $this->primaryKey(11),
            'job_id' => $this->integer(11) .' UNSIGNED NULL',
            'question' => $this->string(250),
            'question_created_at' => $this->datetime(),
            'question_updated_at' => $this->datetime()
        ], $tableOptions);
        
        $this->createIndex ('ind-job_question-job_id', '{{%job_question}}', 'job_id');

        $this->addForeignKey ('fk-job_question-job_id', '{{%job_question}}', 'job_id', '{{%job}}', 'job_id', 'SET NULL' , 'SET NULL');
    
        $this->createTable('{{%job_office}}', [
            'job_office_id' => $this->primaryKey(11),
            'job_id' => $this->integer(11) .' UNSIGNED NULL',
            'office_id' => $this->integer(11),
        ], $tableOptions);
                
        $this->createIndex ('ind-job_office-job_id', '{{%job_office}}', 'job_id');

        $this->addForeignKey ('fk-job_office-job_id', '{{%job_office}}', 'job_id', '{{%job}}', 'job_id', 'SET NULL' , 'SET NULL');

        $this->createIndex ('ind-job_office-office_id', '{{%job_office}}', 'office_id');

        $this->addForeignKey ('fk-job_office-office_id', '{{%job_office}}', 'office_id', '{{%employer_office}}', 'office_id', 'SET NULL' , 'SET NULL');

        $this->createTable('{{%student_job_application_question}}', [
            'jaq_id' => $this->primaryKey(11),
            'application_id' => $this->integer(11) .' UNSIGNED NULL',
            'question_id' => $this->integer(11),
            'question' => $this->string(250),
            'answer' => $this->text(),
        ], $tableOptions);
        
        $this->createIndex ('ind-student_job_application_question-application_id', '{{%student_job_application_question}}', 'application_id');

        $this->addForeignKey ('fk-student_job_application_question-application_id', 
            '{{%student_job_application_question}}', 'application_id', 
            '{{%student_job_application}}', 'application_id', 'SET NULL' , 'SET NULL');

        $this->createIndex ('ind-student_job_application_question-question_id', '{{%student_job_application_question}}', 'question_id');

        $this->addForeignKey ('fk-student_job_application_question-question_id', 
            '{{%student_job_application_question}}', 'question_id', 
            '{{%job_question}}', 'job_question_id', 'SET NULL' , 'SET NULL');
    }
}
