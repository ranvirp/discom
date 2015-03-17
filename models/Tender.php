<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tender".
 *
 * @property integer $id
 * @property integer $work_id
 * @property string $dateofpub
 * @property string $dateofopening
 * @property string $dateofworkorder
 *
 * @property Work $work
 */
class Tender extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tender';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['work_id'], 'integer'],
            [['dateofpub', 'dateofopening', 'dateofworkorder'], 'safe']
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
            'dateofpub' => 'Dateofpub',
            'dateofopening' => 'Dateofopening',
            'dateofworkorder' => 'Dateofworkorder',
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
