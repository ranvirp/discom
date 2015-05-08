<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "designation_type".
 *
 * @property integer $id
 * @property integer $level_id
 * @property string $name_hi
 * @property string $name_en
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
            'level_id' => 'Level ID',
            'name_hi' => 'Name Hi',
            'name_en' => 'Name En',
        ];
    }
    public function getLevel()
    {
    return \app\models\Level::findOne($this->level_id);

    }
}
