<?php

namespace app\modules\api\controllers;

use yii\web\Controller;
use Yii;

class DefaultController extends Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }
	public function actionGentoken()
	{
		
		$username=\Yii::$app->request->post('username');
		$password=\Yii::$app->request->post('password');
		//$userClass=\Yii::$app->components['user']['identityClass'];
		$userClass='\amnah\yii2\user\models\User';
			
		
		
		$user= $userClass::find()->where(['username'=>$username])->one();
		
		
		if ($user->verifyPassword($password))
		{
		    $user->api_key=Yii::$app->security->generateRandomString();
			$user->save();
			//$user->generateAccessToken();
			return $user->api_key;
		}
		else 
			return '';
	}
}
