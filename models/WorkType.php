<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "work_type".
 *
 * @property integer $id
 * @property string $name_hi
 * @property string $name_en
 *
 * @property Work[] $works
 */
class WorkType extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'work_type';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name_hi', 'name_en'], 'string', 'max' => 50]
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
    public function getWorks()
    {
        return $this->hasMany(Work::className(), ['work_type_id' => 'id']);
    }
}
