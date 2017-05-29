<?php

use yii\db\Migration;

class m170526_150124_primary_key extends Migration
{
    public function up()
    {
        $this->addColumn('student_language', 'id', $this->primaryKey());
        $this->addColumn('student_major', 'id', $this->primaryKey());
    }

    public function down()
    {
        echo "m170526_150124_primary_key cannot be reverted.\n";

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
