<?php

namespace studentapi\models;

use Yii;
use yii\db\Expression;
use common\models\StudentJobApplication;
use common\models\StudentMajor;
use common\models\StudentLanguage;

/**
 * This is the model class for table "student".
 * It extends from \common\models\Student but with custom functionality for Student application module
 * 
 */
class Student extends \common\models\Student {
    
    /**
     * @inheritdoc
     */
    public function fields()
    {
        $fields = parent::fields();

        // remove fields that contain sensitive information
        unset($fields['student_auth_key'],
        $fields['student_password_hash'],
        $fields['student_password_reset_token']);

        $fields['total_job_applied'] = function($model) {
            return StudentJobApplication::find()
                ->where(['student_id' => $this->student_id])
                ->count();
        };

        return $fields;
    }
    
    /**
     * @param bool $insert
     * @return bool
     */
    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            // Move uploaded files to permanent bucket
            $this->_moveTemporaryFilesToPermanentBucket();
            return true;
        }
        return false;
    }
    
    /**
     * Moves the newly uploaded files from the temporary bucket to the permanent one
     * If their values have changed and their files exist in the temporary bucket.
     */
    private function _moveTemporaryFilesToPermanentBucket()
    {
        $folderName = 'student-photo';

        if($this->student_photo !== $this->getOldAttribute('student_photo'))
        {
            $fileName = $this->student_photo;
            $sourceBucket = Yii::$app->temporaryBucketResourceManager->bucket;
            $targetPath = $folderName."/".$fileName;

            // Copy using S3ResourceManager Component
            Yii::$app->resourceManager->copy($fileName, $targetPath, $sourceBucket);

            // Generate a thumbnail of uploaded files
            $this->_generateThumbnail($fileName, $folderName);

            // Adjust filename in storage to use path within bucket
            $this->student_photo = $fileName;
        }
    }

    /**
     * Generate thumbnail for provided filename and store in corresponding folder in bucket
     * @param  string $fileName
     * @param  string $folderName
     */
    private function _generateThumbnail($fileName, $folderName, $size = 100)
    {
        // Create temporary file to store image in
        $tmpFile = tempnam(sys_get_temp_dir(), "TEMP");
        rename($tmpFile, $fileName);
        $tmpFile = $fileName;

        // Resize to $size x $size
        $thumbnail = new \Imagine\Gd\Imagine();
        $thumbnail = $thumbnail->open('https://bawes-public.s3.amazonaws.com/'.$fileName);
        $thumbnail->resize($thumbnail->getSize()->widen($size));
        $thumbnail->save($tmpFile);

        // Save thumbnail to S3
        Yii::$app->resourceManager->save(
            null, //file upload object
            "$folderName/thumb-$size/$fileName", // name
            [], //options
            $tmpFile, // source file
            mime_content_type($tmpFile)
        );

        // Delete the tmp file
        unlink($tmpFile);
    }

    /**
     * Sends an email requesting a user to verify his email address
     * @return boolean whether the email was sent
     */
    public function sendVerificationEmail() {
        
        //Update student last email limit timestamp
        $this->student_limit_email = new Expression('NOW()');
        $this->save(false);

        if($this->student_new_email)
        {
            $email = $this->student_new_email;
        }
        else
        {
            $email = $this->student_email;
        }        

        if (!$this->student_language_pref || $this->student_language_pref == "en-US") {
            //Set language based on preference stored in DB
            Yii::$app->view->params['isArabic'] = false;

            //Send English Email
            return Yii::$app->mailer->compose([
                    'html' => 'student-api/verificationEmail-html',
                    'text' => 'student-api/verificationEmail-text',
                ], [
                    'student' => $this
                ])
                ->setFrom(['contact@studenthub.co' => 'StudentHub'])
                ->setTo($email)
                ->setSubject('[StudentHub] Email Verification')
                ->send();
        } else {
            //Set language based on preference stored in DB
            Yii::$app->view->params['isArabic'] = true;

            //Send Arabic Email
            return Yii::$app->mailer->compose([
                    'html' => 'student-api/verificationEmail-ar-html',
                    'text' => 'student-api/verificationEmail-ar-text',
                ], [
                    'student' => $this
                ])
                ->setFrom([\Yii::$app->params['supportEmail'] => \Yii::$app->name ])
                ->setTo($email)
                ->setSubject('[StudentHub] التحقق من البريد الإلكتروني')
                ->send();
        }
    }
}
