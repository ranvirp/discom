<?php

namespace app\modules\masterdata\models;

use Yii;

/**
 * This is the model class for table "level".
 *
 * @property integer $id
 * @property string $class_name
 * @property integer $dept_id
 * @property string $name_hi
 * @property string $name_en
 *
 * @property Department $dept
 */
class Level extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'level';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['dept_id'], 'integer'],
            [['name_hi', 'name_en'], 'string'],
            [['class_name'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'class_name' => Yii::t('app', 'Class Name'),
            'dept_id' => Yii::t('app', 'Dept ID'),
            'name_hi' => Yii::t('app', 'Name Hi'),
            'name_en' => Yii::t('app', 'Name En'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDept()
    {
        return $this->hasOne(Department::className(), ['id' => 'dept_id']);
    }
}
