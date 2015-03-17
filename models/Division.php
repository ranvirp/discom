<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "division".
 *
 * @property integer $id
 * @property integer $circle_id
 * @property string $name_hi
 * @property string $name_en
 *
 * @property Circle $circle
 */
class Division extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'division';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['circle_id'], 'integer'],
            [['name_hi', 'name_en'], 'string', 'max' => 200]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'circle_id' => 'Circle ID',
            'name_hi' => 'Name Hi',
            'name_en' => 'Name En',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCircle()
    {
        return $this->hasOne(Circle::className(), ['id' => 'circle_id']);
    }
}
