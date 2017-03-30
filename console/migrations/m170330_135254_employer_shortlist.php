<?php

use yii\db\Migration;

class m170330_135254_employer_shortlist extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%employer_shortlist}}', [
            'shortlist_id' => $this->primaryKey(),
            'employer_id' => $this->integer(11). 'UNSIGNED NULL',
            'application_id' => $this->integer(11). 'UNSIGNED NULL',
            'date_added' => $this->datetime()            
        ], $tableOptions);

        $this->createIndex ('ind-employer_shortlist-employer_id', '{{%employer_shortlist}}', 'employer_id');

        $this->addForeignKey ('fk-employer_shortlist-employer_id', '{{%employer_shortlist}}', 'employer_id', '{{%employer}}', 'employer_id', 'SET NULL' , 'SET NULL');

        $this->createIndex ('ind-employer_shortlist-application_id', '{{%employer_shortlist}}', 'application_id');

        $this->addForeignKey ('fk-employer_shortlist-application_id', '{{%employer_shortlist}}', 'application_id', '{{%student_job_application}}', 'application_id', 'SET NULL' , 'SET NULL');
    }

    public function down()
    {
        echo "m170330_135254_employer_shortlist cannot be reverted.\n";

        return false;
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
