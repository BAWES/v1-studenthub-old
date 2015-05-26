<?php

namespace common\models;

use Yii;
use yii\db\Expression;

/**
 * StudentQuery extends ActiveQuery, allowing easier filtering of students
 */
class StudentQuery extends \yii\db\ActiveQuery{
    
    /**
     * Active Students Only
     * Non-banned and verified both email and ID
     */
    public function active()
    {
        return $this->andWhere([
                'student_id_verification' => Student::ID_VERIFIED,
                'student_email_verification' => Student::EMAIL_VERIFIED,
                'student_banned' => Student::BAN_STUDENT_NOT_BANNED,
                ]);
    }
    
    /**
     * Filter by minimum GPA
     * @param int $gpa Minimum GPA
     */
    public function minimumGPA($gpa)
    {
        return $this->andFilterWhere(['>=', 'student_gpa', $gpa]);
    }
    
    /**
     * Filter by Graduation Year
     * @param int $yearStart The start graduation year
     * @param int $yearEnd The end graduation year
     */
    public function graduationYearBetween($yearStart, $yearEnd)
    {
        return $this->andFilterWhere(['>=', 'student_graduating_year', $yearStart])
                    ->andFilterWhere(['<=', 'student_graduating_year', $yearEnd]);
    }
    
    /**
     * Filter by transportation
     * @param int $transportation Constant value from class Student (if available or not)
     */
    public function transportationAvailable($transportation = Student::TRANSPORTATION_AVAILABLE)
    {
        return $this->andFilterWhere(['student_transportation' => $transportation]);
    }
    
    /**
     * Filter by English language level
     * @param int $level Student class constant, showing english language level
     */
    public function englishLevel($level)
    {
        return $this->andFilterWhere(['student_english_level' => $level]);
    }
    
    /**
     * Filter by Degree
     * @param int $degree ID of the degree
     */
    public function degree($degree)
    {
        return $this->andFilterWhere(['degree_id' => $degree]);
    }
    
    /**
     * Filter by Nationality
     * If a student has any of the nationalities in the array, he passes the filter
     * @param array $nationalities array of nationality IDs to filter students from
     */
    public function nationalityFilter($nationalities)
    {
        if(!empty($nationalities)){
            return $this->andFilterWhere(['in', 'country_id', $nationalities]);
        }else return $this;
    }
    
    /**
     * Filter by University
     * If a student belongs to any of the universities in the array, he passes the filter
     * @param array $universities array of university IDs to filter students from
     */
    public function universityFilter($universities)
    {
        if(!empty($universities)){
            return $this->andFilterWhere(['in', 'university_id', $universities]);
        }else return $this;
    }
    
    /**
     * Filter by Language Spoken
     * If a student speaks to any of the languages in the array, he passes the filter
     * @param array $languages array of language IDs to filter students from
     */
    public function languageFilter($languages)
    {
        if(!empty($languages)){
            return $this->joinWith('languages')
                        ->andWhere(['in', 'language.language_id', $languages]);
        }else return $this;
    }
    
    /**
     * Filter by Majorn
     * If a student majors to any of the majors in the array, he passes the filter
     * @param array $majors array of major IDs to filter students from
     */
    public function majorFilter($majors)
    {
        if(!empty($majors)){
            return $this->joinWith('majors')
                        ->andWhere(['in', 'major.major_id', $majors]);
        }else return $this;
    }
    
    
}