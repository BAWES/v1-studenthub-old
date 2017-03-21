<?php

use yii\db\Migration;

class m170321_115238_clear_filter_logic extends Migration
{
    public function up()
    {
        $this->dropTable('filter');
        $this->dropTable('filter_country');
        $this->dropTable('filter_language');
        $this->dropTable('filter_major');
        $this->dropTable('filter_university');
        $this->dropTable('student_job_qualification');
        $this->dropTable('job_process_queue');

        $this->dropColumn('payment', 'payment_job_num_applicants');
        $this->dropColumn('payment', 'payment_job_num_filters');
        $this->dropColumn('payment', 'payment_job_filter_price_per_applicant');
        $this->dropColumn('payment', 'payment_job_initial_price_per_applicant');
        $this->dropColumn('payment', 'payment_job_total_price_per_applicant');
    }
}
