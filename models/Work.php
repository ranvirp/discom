<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "work".
 *
 * @property integer $id
 * @property string $name_hi
 * @property string $name_en
 * @property integer $agency
 * @property string $dateofsanction
 * @property string $dateoffundsreceipt
 * @property string $dateofstart
 * @property double $totvalue
 * @property integer $dept_id
 * @property integer $work_type_id
 * @property string $address
 * @property double $gpslat
 * @property double $gpslong
 * @property string $loc
 * @property integer $status
 * @property integer $scheme_id
 * @property integer $work_admin
 * @property string $fromloc
 * @property string $toloc
 * @property integer $substation_id
 * @property integer $division_id
 *
 * @property WorkProgress[] $workProgresses
 * @property Material[] $materials
 * @property Tender[] $tenders
 * @property Photo[] $photos
 * @property MaterialRequirement[] $materialRequirements
 * @property Agency $agency0
 * @property Department $dept
 * @property WorkType $workType
 * @property Scheme $scheme
 * @property Designation $workAdmin
 * @property Substation $substation
 * @property Division $division
 */
class Work extends \yii\db\ActiveRecord
{
	 const FUND_NOT_RECEIVED =1;
	 const TENDER_NOT_ISSUED =2;
     const WORK_NOT_STARTED =3;
	 const WORK_IN_PROGRESS =4;
	 const WORK_COMPLETED =5;
	 public static function status()
	 {
		  return [ 
		  self::FUND_NOT_RECEIVED =>\Yii::t('app','Funds Not Received'),
		self::TENDER_NOT_ISSUED=>\Yii::t('app',"Tender Not Issued"),
		self::WORK_NOT_STARTED=>\Yii::t('app',"Work Not Started"),
		self::WORK_IN_PROGRESS=>\Yii::t('app',"Work In Progress"),
		self::WORK_COMPLETED=>\Yii::t('app',"Work Completed")];
	 }
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'work';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name_hi', 'name_en', 'loc', 'fromloc', 'toloc'], 'string'],
            [['agency', 'dept_id', 'work_type_id', 'status', 'scheme_id', 'work_admin', 'substation_id', 'division_id'], 'integer'],
            [['dateofsanction', 'dateoffundsreceipt', 'dateofstart'], 'safe'],
            [['totvalue', 'gpslat', 'gpslong'], 'number'],
            [['address'], 'string', 'max' => 250]
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
            'agency' => Yii::t('app', 'Agency'),
            'dateofsanction' => Yii::t('app', 'Dateofsanction'),
            'dateoffundsreceipt' => Yii::t('app', 'Dateoffundsreceipt'),
            'dateofstart' => Yii::t('app', 'Dateofstart'),
            'totvalue' => Yii::t('app', 'Totvalue'),
            'dept_id' => Yii::t('app', 'Dept ID'),
            'work_type_id' => Yii::t('app', 'Work Type ID'),
            'address' => Yii::t('app', 'Address'),
            'gpslat' => Yii::t('app', 'Gpslat'),
            'gpslong' => Yii::t('app', 'Gpslong'),
            'loc' => Yii::t('app', 'Loc'),
            'status' => Yii::t('app', 'Status'),
            'scheme_id' => Yii::t('app', 'Scheme ID'),
            'work_admin' => Yii::t('app', 'Work Admin'),
            'fromloc' => Yii::t('app', 'Fromloc'),
            'toloc' => Yii::t('app', 'Toloc'),
            'substation_id' => Yii::t('app', 'Substation ID'),
            'division_id' => Yii::t('app', 'Division ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWorkProgresses()
    {
        return $this->hasMany(WorkProgress::className(), ['work_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMaterials()
    {
        return $this->hasMany(Material::className(), ['work_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTenders()
    {
        return $this->hasMany(Tender::className(), ['work_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPhotos()
    {
        return $this->hasMany(Photo::className(), ['work_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMaterialRequirements()
    {
        return $this->hasMany(MaterialRequirement::className(), ['work_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAgency0()
    {
        return $this->hasOne(Agency::className(), ['id' => 'agency']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDept()
    {
        return $this->hasOne(Department::className(), ['id' => 'dept_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWorkType()
    {
        return $this->hasOne(WorkType::className(), ['id' => 'work_type_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getScheme()
    {
        return $this->hasOne(Scheme::className(), ['id' => 'scheme_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWorkAdmin()
    {
        return $this->hasOne(Designation::className(), ['id' => 'work_admin']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSubstation()
    {
        return $this->hasOne(Substation::className(), ['id' => 'substation_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDivision()
    {
        return $this->hasOne(Division::className(), ['id' => 'division_id']);
    }
}
