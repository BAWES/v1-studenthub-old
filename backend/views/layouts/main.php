<?php
use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;
use common\models\Student;
use common\models\Employer;
use common\models\Job;

/* @var $this \yii\web\View */
/* @var $content string */

//Processing for notifications
$numStudentsNeedIdVerification = Student::find()->where(['student_id_verification' => Student::ID_NOT_VERIFIED])
                                ->andWhere(['not like', 'student_support_field', 'Removed'])
                                ->count();
                                
$numStudentsNeedEmailVerification = Student::find()->where(['student_email_verification' => Student::EMAIL_NOT_VERIFIED])
                                ->andWhere(['not like', 'student_support_field', 'Removed'])
                                ->count();

$numEmployersNeedEmailVerification = Employer::find()->where(['employer_email_verification' => Employer::EMAIL_NOT_VERIFIED])
                                ->andWhere(['not like', 'employer_support_field', 'Removed'])
                                ->count();

$numJobsPending = Job::find()->where(['job_status' => Job::STATUS_PENDING])->count();

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <!-- BEGIN SHORTCUT AND TOUCH ICONS -->
    <link rel="shortcut icon" href="<?= Url::to('@web/images/icons') ?>/favicon.ico" type="image/x-icon" />
    <link rel="apple-touch-icon" sizes="57x57" href="<?= Url::to('@web/images/icons') ?>/apple-touch-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="<?= Url::to('@web/images/icons') ?>/apple-touch-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="<?= Url::to('@web/images/icons') ?>/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="<?= Url::to('@web/images/icons') ?>/apple-touch-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="<?= Url::to('@web/images/icons') ?>/apple-touch-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="<?= Url::to('@web/images/icons') ?>/apple-touch-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="<?= Url::to('@web/images/icons') ?>/apple-touch-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="<?= Url::to('@web/images/icons') ?>/apple-touch-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="<?= Url::to('@web/images/icons') ?>/apple-touch-icon-180x180.png">
    <link rel="icon" type="image/png" href="<?= Url::to('@web/images/icons') ?>/favicon-16x16.png" sizes="16x16">
    <link rel="icon" type="image/png" href="<?= Url::to('@web/images/icons') ?>/favicon-32x32.png" sizes="32x32">
    <link rel="icon" type="image/png" href="<?= Url::to('@web/images/icons') ?>/favicon-96x96.png" sizes="96x96">
    <link rel="icon" type="image/png" href="<?= Url::to('@web/images/icons') ?>/android-chrome-192x192.png" sizes="192x192">
    <meta name="msapplication-square70x70logo" content="<?= Url::to('@web/images/icons') ?>/smalltile.png" />
    <meta name="msapplication-square150x150logo" content="<?= Url::to('@web/images/icons') ?>/mediumtile.png" />
    <meta name="msapplication-wide310x150logo" content="<?= Url::to('@web/images/icons') ?>/widetile.png" />
    <meta name="msapplication-square310x310logo" content="<?= Url::to('@web/images/icons') ?>/largetile.png" />
    <!-- END SHORTCUT AND TOUCH ICONS -->
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
    <?php $this->beginBody() ?>
    <div class="wrap">
        <?php
            NavBar::begin([
                'brandLabel' => 'StudentHub Admin System',
                'brandUrl' => Yii::$app->homeUrl,
                'options' => [
                    'class' => 'navbar-inverse navbar-fixed-top',
                ],
            ]);
            $menuItems = [];
            
            if (Yii::$app->user->isGuest) {
                $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
            } else {
                $menuItems = 
                [
                    ['label' => 'Dashboard', 'url' => ['/site/index']],
                    
                    //Require Assistance
                    [
                        'label' => 'Require Assistance',
                        'items' => [
                            ['label' => "Pending Jobs <span class='badge'>$numJobsPending</span>", 
                                'url' => ['/job/index', 'jobStatus' => 'pending']],
                            ['label' => "Student ID Verify <span class='badge'>$numStudentsNeedIdVerification</span>", 
                                'url' => ['/student/verify-id-required']],
                            ['label' => "Student Email Verify <span class='badge'>$numStudentsNeedEmailVerification</span>", 
                                'url' => ['/student/verify-email-required']],
                            ['label' => "Employer Email Verify <span class='badge'>$numEmployersNeedEmailVerification</span>", 
                                'url' => ['/employer/verify-email-required']],
                            ['label' => "<span style='color:darkred'>Removed Students</span>", 
                                'url' => ['/student/list-removed']],
                            ['label' => "<span style='color:darkred'>Removed Employers</span>", 
                                'url' => ['/employer/list-removed']],
                        ],
                    ],
                    //Job Management
                    [
                        'label' => 'Jobs',
                        'items' => [
                            ['label' => 'Open Jobs', 'url' => ['/job/index', 'jobStatus' => 'open']],
                            ['label' => 'Draft Jobs', 'url' => ['/job/index', 'jobStatus' => 'draft']],
                            ['label' => 'Closed Jobs', 'url' => ['/job/index', 'jobStatus' => 'closed']],
                            ['label' => 'All Jobs', 'url' => ['/job/index', 'jobStatus' => 'all']],
                        ],
                    ],
                    //Sales Management
                    [
                        'label' => 'Sales',
                        'items' => [
                            ['label' => 'Payments', 'url' => ['/payment/index']],
                            ['label' => 'Payment Types', 'url' => ['/payment-type/index']],
                            ['label' => 'Inactive Employers', 'url' => ['/employer/inactive']],
                            ['label' => 'Inactive Students', 'url' => ['/student/inactive']],
                            ['label' => 'KNET Payments', 'url' => ['/knet-payment/index']],
                            ['label' => 'Cybersource Payments', 'url' => ['/cybersource-payment/index']],
                        ],
                    ],
                    //User Management
                    [
                        'label' => 'Accounts',
                        'items' => [
                            ['label' => 'Students', 'url' => ['/student/index']],
                            ['label' => 'Employers', 'url' => ['/employer/index']],
                            ['label' => 'Admins', 'url' => ['/admin/index']],
                        ],
                    ],
                    //Pre-set Controls (no need to touch)
                    [
                        'label' => 'Pre-set Controls',
                        'items' => [
                            ['label' => 'Universities', 'url' => ['/university/index']],
                            ['label' => 'Industries', 'url' => ['/industry/index']],
                            ['label' => 'Degrees', 'url' => ['/degree/index']],
                            ['label' => 'Majors', 'url' => ['/major/index']],
                            ['label' => 'Job Types', 'url' => ['/jobtype/index']],
                            ['label' => 'Languages', 'url' => ['/language/index']],
                            ['label' => 'Countries', 'url' => ['/country/index']],
                            ['label' => 'Cities', 'url' => ['/city/index']],
                            ['label' => 'Log', 'url' => ['/log/index']],
                        ],
                    ],
                    
                    
                    [
                        'label' => 'Logout (' . Yii::$app->user->identity->admin_name . ')',
                        'url' => ['/site/logout'],
                        'linkOptions' => ['data-method' => 'post']
                    ]
                ];
            }
            
            echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-right'],
                'items' => $menuItems,
                'encodeLabels' => false,
            ]);
            NavBar::end();
        ?>

        <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
        </div>
    </div>

    <footer class="footer">
        <div class="container">
        <p class="pull-left">&copy; BAWES <?= date('Y') ?></p>
        <p class="pull-right">Built Awesome</p>
        </div>
    </footer>

    <?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
