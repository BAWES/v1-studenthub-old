<?php
Yii::setAlias('common', dirname(__DIR__));
Yii::setAlias('frontend', dirname(dirname(__DIR__)) . '/frontend');
Yii::setAlias('backend', dirname(dirname(__DIR__)) . '/backend');
Yii::setAlias('employer', dirname(dirname(__DIR__)) . '/employer');
Yii::setAlias('console', dirname(dirname(__DIR__)) . '/console');

//Image Upload Paths
Yii::setAlias('universityImages','@frontend/web/images/universities/');
Yii::setAlias('studentImages','@frontend/web/images/students/');
Yii::setAlias('employerImages','@frontend/web/images/employers/');