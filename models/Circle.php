<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "circle".
 *
 * @property integer $id
 * @property string $name_hi
 * @property string $name_en
 *
 * @property Division[] $divisions
 */
class Circle extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'circle';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
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
            'name_hi' => 'Name Hi',
            'name_en' => 'Name En',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDivisions()
    {
        return $this->hasMany(Division::className(), ['circle_id' => 'id']);
    }
}
