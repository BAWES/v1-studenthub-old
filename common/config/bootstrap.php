<?php
Yii::setAlias('common', dirname(__DIR__));
Yii::setAlias('frontend', dirname(dirname(__DIR__)) . '/frontend');
Yii::setAlias('backend', dirname(dirname(__DIR__)) . '/backend');
Yii::setAlias('employer', dirname(dirname(__DIR__)) . '/employer');
Yii::setAlias('console', dirname(dirname(__DIR__)) . '/console');

//Image Upload Paths
Yii::setAlias('universityImages','@frontend/web/images/universities');

//Amazon S3 Alias
Yii::setAlias('s3','https://studenthub.s3.amazonaws.com');
Yii::setAlias('temporary','@s3/temporary');
Yii::setAlias('studentIdentification','@s3/student-identification');
Yii::setAlias('studentCv','@s3/student-cv');
Yii::setAlias('studentPhoto','@s3/student-photo');