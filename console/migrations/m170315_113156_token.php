<?php

use yii\db\Migration;

class m170315_113156_token extends Migration
{
    public function up()
    {  
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%employer_token}}', [
            'token_id' => $this->primaryKey(),
            'employer_id' => $this->integer(11). 'UNSIGNED NULL',
            'token_value' => $this->string(255),
            'token_device' => $this->string(255),
            'token_device_id' => $this->string(255),
            'token_status' => $this->smallInteger(6),
            'token_last_used_datetime' => $this->datetime(),
            'token_expiry_datetime' => $this->datetime(), 
            'token_created_datetime' => $this->datetime()            
        ], $tableOptions);

        $this->createIndex ('ind-employer_token-employer_id', '{{%employer_token}}', 'employer_id');

        $this->addForeignKey ('fk-employer_token-employer_id', '{{%employer_token}}', 'employer_id', '{{%employer}}', 'employer_id', 'SET NULL' , 'SET NULL');

        $this->createTable('{{%student_token}}', [
            'token_id' => $this->primaryKey(),
            'student_id' => $this->integer(11). 'UNSIGNED NULL',
            'token_value' => $this->string(255),
            'token_device' => $this->string(255),
            'token_device_id' => $this->string(255),
            'token_status' => $this->smallInteger(6),
            'token_last_used_datetime' => $this->datetime(),
            'token_expiry_datetime' => $this->datetime(), 
            'token_created_datetime' => $this->datetime()            
        ], $tableOptions);

        $this->createIndex ('ind-student_token-student_id', '{{%student_token}}', 'student_id');
        
        $this->addForeignKey ('fk-student_token-student_id', '{{%student_token}}', 'student_id', '{{%student}}', 'student_id', 'SET NULL' , 'SET NULL');
    }

    public function down()
    {
        echo "m170315_113156_token cannot be reverted.\n";

        return false;
    }
}
