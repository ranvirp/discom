<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\commands;


	
use Yii;
use yii\console\Controller;

class RbacController extends Controller
{
    public function actionInit()
    {
        $auth = Yii::$app->authManager;

        // add "editMaster" permission
		if (!($editMasterData=$auth->getPermission('editMasterData')))
		{
           $editMasterData = $auth->createPermission('editMasterData');
           $editMasterData->description = 'Edits Master Data';
           $auth->add($editMasterData);
		}
        if (!($editWork=$auth->getPermission('editWork')))
		{
        $editWork = $auth->createPermission('editWork');
        $editWork->description = 'Edit Work';
        $auth->add($editWork);
		}
		if (!($operator=$auth->getRole('operator')))
		{
        // add "author" role and give this role the "createPost" permission
           $operator= $auth->createRole('operator');
		   $auth->add($operator);
		}
        
        $auth->addChild($operator, $editMasterData);
		$auth->addChild($operator, $editWork);
		
        

        
    }
	public function actionAssign($username,$role)
	{
		 $auth = Yii::$app->authManager;
		 $userid=\amnah\yii2\user\models\User::find()->where(['username'=>$username])->one()->id;
		 $authRole=$auth->getRole($role);
		 if ($authRole)
		$auth->assign($authRole,$userid);
	}
}

