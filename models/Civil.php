<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "civil".
 *
 * @property integer $id
 * @property double $totvalue
 * @property string $dateofstart
 * @property integer $status
 */
class Civil extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'civil';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['totvalue'], 'number'],
            [['dateofstart'], 'safe'],
            [['status'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'totvalue' => 'Totvalue',
            'dateofstart' => 'Dateofstart',
            'status' => 'Status',
        ];
    }
}
