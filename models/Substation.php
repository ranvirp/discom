<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "substation".
 *
 * @property integer $id
 * @property string $shortcode
 * @property string $name_hi
 * @property string $name_en
 * @property integer $type
 * @property string $documents
 * @property integer $division_id
 *
 * @property Division $division
 */
class Substation extends \yii\db\ActiveRecord
{
	public static $types=[1=>'33 KV/11 KV',2=>'33 KV/6.6 KV',3=>'Switching SubStation'];
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'substation';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['type', 'division_id'], 'integer'],
            [['documents'], 'string'],
            [['shortcode'], 'string', 'max' => 7],
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
            'shortcode' => 'Shortcode',
            'name_hi' => 'Name Hi',
            'name_en' => 'Name En',
            'type' => 'Type',
            'documents' => 'Documents',
            'division_id' => 'Division ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDivision()
    {
        return $this->hasOne(Division::className(), ['id' => 'division_id']);
    }
}
