<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\models;

/**
 * Description of KescoActiveRecord
 *
 * @author mac
 */
class KescoActiveRecord  extends ActiveRecord{
	//put your code here
	    /**
     * @inheritdoc
     * @return CommentQuery
     */
    public static function find()
    {
        //find designation of the User
		$designation=\app\masterdata\models\Designation::find()->where(['officer_userid'=>Yii::$app->user->id])->one();
		if (get_called_class()=="app\models\Work")
		{
			$query=new \yii\db\ActiveQuery(get_called_class());
			if ($designation->designationtype->shortcode=="JE")
			{
				$sss= \yii\helpers\ArrayHelper::map(\app\models\Substation::find()->asArray()->where(['je'=>$designation])->all(),'id');
				return $query->andWhere(['substation_id'=>$sss]);
			}
			else if ($designation->designationtype->shortcode=="EE")
			{
				return $query->addWhere(['division_code'=>$designation->level->id]);
			}
			else if ($designation->designationtype->shortcode="SE")
			{
					$ddd= \yii\helpers\ArrayHelper::map(\app\models\Division::find()->asArray()->where(['circle_id'=>$designation->level->id])->all(),'id');
				    return $query->andWhere(['division_id'=>$ddd]);
			
			}
			else return $query;
		}
    }
}
