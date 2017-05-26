<?php

use yii\db\Migration;

class m170526_134432_university_seed extends Migration
{
    public function up()
    {
        $this->addColumn('university', 'university_website', $this->string(250)->after('university_domain'));
        $this->addColumn('university', 'university_country', $this->string(100)->after('university_website'));

        $handle = fopen('https://raw.githubusercontent.com/endSly/world-universities-csv/master/world-universities.csv', "r");
        
        $rows = [];

        while (($fileop = fgetcsv($handle, 1000, ",")) !== false) 
        {
            $country = $fileop[0];
            $name = addslashes($fileop[1]);
            $website = $fileop[2];

            $domain = str_replace(['https://', 'http://', 'www.', '/'], ['', '', '', ''], $fileop[2]);

            $rows[] = [$name, $domain, $website, $country];
        }

        Yii::$app->db->createCommand()->batchInsert(
            'university', 
            ['university_name_en', 'university_domain', 'university_website', 'university_country'],
            $rows
        )->execute();
    }
}
