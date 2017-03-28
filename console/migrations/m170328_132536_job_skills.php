<?php

use yii\db\Migration;

class m170328_132536_job_skills extends Migration
{
    public function up()
    {
        $this->dropTable('job_skill');
        $this->dropTable('skill');

        $this->addColumn('job', 'job_desired_skill', $this->string(255)->after('job_responsibilites'));
    }
}
