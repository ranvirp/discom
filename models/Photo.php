<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "photo".
 *
 * @property integer $id
 * @property integer $work_id
 * @property integer $height
 * @property integer $width
 * @property string $mime
 * @property integer $size
 * @property string $url
 * @property string $path
 * @property string $filename
 * @property double $gpslat
 * @property double $gpslong
 * @property string $loc
 *
 * @property Work $work
 */
class Photo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'photo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['work_id', 'height', 'width', 'size','created_by'], 'integer'],
            [['bwid','url', 'path', 'filename', 'loc','title'], 'string'],
            [['gpslat', 'gpslong'], 'number'],
            [['mime'], 'string', 'max' => 50],
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
            'height' => 'Height',
            'width' => 'Width',
            'mime' => 'Mime',
            'size' => 'Size',
            'url' => 'Url',
            'path' => 'Path',
            'filename' => 'Filename',
            'gpslat' => 'Gpslat',
            'gpslong' => 'Gpslong',
            'loc' => 'Loc',
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
