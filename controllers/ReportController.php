<?php

namespace app\controllers;

use Yii;

use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;


/**
 * CircleController implements the CRUD actions for Circle model.
 */
class ReportController extends Controller
{
    
   public function actionIndex($rt)
   {
	   switch($rt)
	   {
		   case 'r1':
			   return $this->render('r1');
		   break;
		   case 'r2':
			   $sid=Yii::$app->request->get('sid');
			   $scheme= \app\models\Scheme::findOne($sid);
               if (!$scheme)
                  {
	                  return 'Scheme does not exist';
                  }
		   
               $dataProvider = new ActiveDataProvider([
                  'query' => $scheme->getWorks(),
               ]);
			   return $this->render('r2',['dataProvider'=>$dataProvider,'scheme'=>$scheme]);
		   break;
		   default:
		   break;
	   }
   }
}
