<?php

namespace app\models;
use Yii;
use \amnah\yii2\user\models\User as BaseUser;
class User extends BaseUser
{
    //public $access_token;

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['api_key' => $token]);
    }
	/**
	 * Generates new access  token
	 */
	public function generateAccessToken()
	{
		$this->api_key = Yii::$app->security->generateRandomString() . '_' . time();
		
		$this->save();
		
	}
	/*
	 * 
	 */
	
		
	
    
}
