<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "work_progress".
 *
 * @property integer $id
 * @property integer $work_id
 * @property integer $physical
 * @property integer $financial
 * @property string $dateofprogress
 * @property string $remarks
 *
 * @property Work $work
 */
class work_progress extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'work_progress';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['work_id', 'physical', 'financial'], 'integer'],
            [['dateofprogress'], 'safe'],
            [['remarks'], 'string']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'work_id' => 'Work ID',
            'physical' => 'Physical',
            'financial' => 'Financial',
            'dateofprogress' => 'Dateofprogress',
            'remarks' => 'Remarks',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWork()
    {
        return $this->hasOne(Work::className(), ['id' => 'work_id']);
    }
}
