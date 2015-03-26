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
class WorkProgress extends \yii\db\ActiveRecord
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
	public function getLatest()
	{
		$query='select *,max(dateofprogress) as latest from work_progress group by dateofprogress';
		$wps= $this->db->createCommand()->queryAll($sql);
		return $wps;
		
	}
	public function afterSave()
	{
		parent::afterSave(true,[]);
		$work=\app\models\Work::findOne($this->work_id);
		
		if ((!$work->dateofprogress) || (strtotime($work->dateofprogress)<strtotime($this->dateofprogress)))
		{
			//print_r($work);
		//exit;
		$work->fin=$this->financial;
		$work->phy=$this->physical;
		$work->dateofprogress=$this->dateofprogress;
		$work->remarks=$this->remarks;
		
		if ($work->save())
			print "Saved";
		else 
			print_r($work->errors);
		//exit;
		}
	}
}
