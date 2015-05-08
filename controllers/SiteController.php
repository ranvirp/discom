<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class SiteController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionIndex()
    {
     //$this->layout = '//main-landingpage'; 
		  
		if (Yii::$app->user->isGuest)
		 {
		  	$this->redirect(['/user/login']);
			
		 }
		if (Yii::$app->user->can('operator'))
			
        return $this->render('dashboard_operator');
		else 
			return $this->render('/pages/md');
    }

    public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->renderPartial('login', [
                'model' => $model,
            ]);
        }
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }

    public function actionAbout()
    {
        return $this->render('about');
    }
	public function actionApk()
	{
		$fullPath='/Volumes/d/workspace/GPSPhotoUploader/bin/GPSPhotoUploader.apk';
		//echo $fullPath;
		
     if (file_exists($fullPath)) {
        //$mime=\yii\helpers\FileHelper::getMimeType($fullPath);
		$mime='application/vnd.android.package-archive';
		$size=filesize($fullPath);
         //header("Pragma: no-cache");
        // header("Expires: 0");
         header('Content-Description: File Transfer');
        // header('Content-Type: ' . CFileHelper::getMimeType($model->fileWithPath()));
         header('Content-Type: ' .$mime );
         header('Content-Disposition: attachment; filename="'.$fullPath.'"');
		 header('Content-Transfer-Encoding:binary');
		 header('Content-Length:'.$size);
		 readFile($fullPath);
		 exit;
	}
	}
}
