<?php
Yii::setAlias('common', dirname(__DIR__));
Yii::setAlias('frontend', dirname(dirname(__DIR__)) . '/frontend');
Yii::setAlias('backend', dirname(dirname(__DIR__)) . '/backend');
Yii::setAlias('employer', dirname(dirname(__DIR__)) . '/employer');
Yii::setAlias('employerapi', dirname(dirname(__DIR__)) . '/employer-api');
Yii::setAlias('studentapi', dirname(dirname(__DIR__)) . '/student-api');
Yii::setAlias('console', dirname(dirname(__DIR__)) . '/console');

//Image Upload Paths
Yii::setAlias('universityImages','@frontend/web/images/universities');

//Amazon S3 Alias
Yii::setAlias('s3','https://studenthub.s3.amazonaws.com');
Yii::setAlias('employer-logo','@s3/employer-logo');
Yii::setAlias('student-id','@s3/student-identification');
Yii::setAlias('student-cv','@s3/student-cv');
Yii::setAlias('student-photo','@s3/student-photo');
