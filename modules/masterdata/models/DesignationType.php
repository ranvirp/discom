<?php

namespace app\modules\masterdata\models;

use Yii;

/**
 * This is the model class for table "designation_type".
 *
 * @property integer $id
 * @property integer $level_id
 * @property string $name_hi
 * @property string $name_en
 * @property string $shortcode
 */
class DesignationType extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'designation_type';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['level_id'], 'integer'],
            [['name_hi', 'name_en'], 'string', 'max' => 50],
            [['shortcode'], 'string', 'max' => 10]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'level_id' => Yii::t('app', 'Level ID'),
            'name_hi' => Yii::t('app', 'Name Hi'),
            'name_en' => Yii::t('app', 'Name En'),
            'shortcode' => Yii::t('app', 'Shortcode'),
        ];
    }
	public function getLevel()
	{
		return $this->hasOne(\app\modules\masterdata\models\Level::className(),['id'=>'level_id']);
	}
}
