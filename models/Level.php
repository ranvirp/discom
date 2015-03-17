<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "level".
 *
 * @property integer $id
 * @property string $name_hi
 * @property string $name_en
 * @property string $table_name
 * @property string $class_name
 *
 * @property DesignationType[] $designationTypes
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
            [['name_hi', 'name_en', 'table_name'], 'string', 'max' => 45],
            [['class_name'], 'string', 'max' => 20]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name_hi' => Yii::t('app', 'Name Hi'),
            'name_en' => Yii::t('app', 'Name En'),
            'table_name' => Yii::t('app', 'Table Name'),
            'class_name' => Yii::t('app', 'Class Name'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDesignationTypes()
    {
        return $this->hasMany(DesignationType::className(), ['level_id' => 'id']);
    }
}
