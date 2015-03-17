<?php

namespace app\modules\masterdata\models;

use Yii;

/**
 * This is the model class for table "designation".
 *
 * @property integer $id
 * @property integer $designation_type_id
 * @property integer $level_id
 * @property string $officer_name_hi
 * @property string $officer_name_en
 * @property string $officer_mobile
 * @property string $officer_mobile1
 * @property string $officer_email
 * @property string $officer_userid
 */
class Designation extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'designation';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['designation_type_id', 'level_id'], 'integer'],
			 [['designation_type_id', 'level_id'], 'required'],
			[['officer_name_hi', 'officer_name_en'], 'required'],
			[['officer_name_hi'],'required'],
            [['officer_name_hi', 'officer_name_en'], 'string', 'max' => 100],
            [['officer_mobile', 'officer_mobile1'], 'string', 'max' => 12],
            [['officer_email'], 'string', 'max' => 50],
            [['officer_userid'], 'string', 'max' => 10]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'designation_type_id' => Yii::t('app', 'Designation Type'),
            'level_id' => Yii::t('app', 'Posting Area/Location'),
            'officer_name_hi' => Yii::t('app', 'Officer Name in Hindi'),
            'officer_name_en' => Yii::t('app', 'Officer Name in English'),
            'officer_mobile' => Yii::t('app', 'Officer Mobile'),
            'officer_mobile1' => Yii::t('app', 'Another Officer Mobile '),
            'officer_email' => Yii::t('app', 'Officer Email'),
            'officer_userid' => Yii::t('app', 'Officer Userid'),
        ];
    }
	
}
