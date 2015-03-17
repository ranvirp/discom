<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "material_type".
 *
 * @property integer $id
 * @property string $name_hi
 * @property string $name_en
 *
 * @property Material[] $materials
 */
class MaterialType extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'material_type';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name_hi', 'name_en'], 'string', 'max' => 1000]
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
    public function getMaterials()
    {
        return $this->hasMany(Material::className(), ['type' => 'id']);
    }
}
