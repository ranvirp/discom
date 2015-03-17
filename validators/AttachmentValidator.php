<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\validators;

/**
 * Description of AttachmentValidator
 *
 * @author mac
 */
class AttachmentValidator extends \yii\validators\Validator{
    //put your code here
	protected function validateValue($data)
	{
		$x=implode(",",$data);
		foreach ($x as $fileid)
		{
			if (is_integer($fileid))
			{
				$file = \app\models\File::findOne($fileid);
				if ((!$file) || ($file->uploaded_by !=Yi::$app->user->id))
					return ['error in file ids used, either not uploaded by the current user or not ids at all'];
			}
		}
		return null;
	}
}
