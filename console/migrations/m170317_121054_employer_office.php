<?php

use yii\db\Migration;

class m170317_121054_employer_office extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%employer_office}}', [
            'office_id' => $this->primaryKey(),
            'employer_id' => $this->integer(11).' UNSIGNED NULL',
            'city_id' => $this->integer(11).' UNSIGNED NULL',
            'office_name_en' => $this->string(100),
            'office_name_ar' => $this->string(100),
            'office_longitude' => $this->decimal(9, 6),
            'office_latitude' => $this->decimal(9, 6),
            'office_address' => $this->text(),
            'office_created_at' => $this->datetime(),
            'office_updated_at' => $this->datetime()           
        ], $tableOptions);

        //employer 

        $this->createIndex ('ind-employer_office-employer_id', '{{%employer_office}}', 'employer_id');

        $this->addForeignKey ('fk-employer_office-employer_id', '{{%employer_office}}', 'employer_id', '{{%employer}}', 'employer_id', 'SET NULL' , 'SET NULL');

        //city 

        $this->createIndex ('ind-employer_office-city_id', '{{%employer_office}}', 'city_id');

        $this->addForeignKey ('fk-employer_office-city_id', '{{%employer_office}}', 'city_id', '{{%city}}', 'city_id', 'SET NULL' , 'SET NULL');
    }
}
