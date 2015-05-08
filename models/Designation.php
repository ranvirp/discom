<?php

namespace app\models;

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
            'id' => 'ID',
            'designation_type_id' => 'Designation Type ID',
            'level_id' => 'Level ID',
            'officer_name_hi' => 'Officer Name Hi',
            'officer_name_en' => 'Officer Name En',
            'officer_mobile' => 'Officer Mobile',
            'officer_mobile1' => 'Officer Mobile1',
            'officer_email' => 'Officer Email',
            'officer_userid' => 'Officer Userid',
        ];
    }
    /*
    */
    public function getDesignationtype()
    {
      return \app\models\DesignationType::findOne($this->designation_type_id);
    }
    public function getLevel()
    {
      return $this->getDesignationtype()->getLevel()->name_en;
    }
}
