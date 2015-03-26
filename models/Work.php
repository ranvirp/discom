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
	 public static $work_type_rules=[3=>['show'=>['address','gpslat','gpslong'],'required'=>['address','gpslat','gpslong']],
			4=>['show'=>['substation_id'],'required'=>['substation_id']],
			5=>['show'=>['substation_id'],'required'=>['substation_id']],
			6=>['show'=>['substation_id'],'required'=>['substation_id']],
			7=>['show'=>['substation_id','fromloc','toloc'],'required'=>['substation_id']],
			8=>['show'=>['feeder_id'],'required'=>['feeder_id']],
			9=>['show'=>['substation_id'],'required'=>['substation_id']],
			10=>['show'=>['substation_id','feeder_id'],'required'=>['substation_id','feeder_id']],
			11=>['show'=>['feeder_id'],'required'=>['feeder_id']],
			12=>['show'=>['feeder_id'],'required'=>['feeder_id']],
			13=>['show'=>['feeder_id'],'required'=>['feeder_id']],
			14=>['show'=>['substation_id'],'required'=>['substation_id']],
			15=>['show'=>['address','gpslat','gpslong'],'required'=>['address','gpslat','gpslong']],
			16=>['show'=>['address','gpslat','gpslong'],'required'=>['address','gpslat','gpslong']],
			17=>['show'=>['substation_id','fromloc','toloc'],'required'=>['substation_id','fromloc','toloc']],
			18=>['show'=>['feeder_id'],'required'=>['feeder_id']],
			19=>['show'=>['substation_id'],'required'=>['substation_id']],
			
			];
	 //public $fin;//latest financial Progress
	 //public $phy;//latest Physical Progress
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
            [['name_hi', 'name_en', 'loc', 'fromloc', 'toloc','remarks'], 'string'],
            [['agency', 'dept_id', 'work_type_id', 'status', 'scheme_id', 'work_admin', 'substation_id', 'division_id'], 'integer'],
            [['dateofsanction','feeder_id', 'dateoffundsreceipt', 'work_id','dateofstart','dateofprogress'], 'safe'],
            [['totvalue', 'gpslat', 'gpslong','phy','fin'], 'number'],
            [['address'], 'string', 'max' => 250],
			
			[['name_en','work_type_id','work_id','scheme_id','totvalue','division_id'],'required'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name_hi' => Yii::t('app', 'Name in Hindi'),
            'name_en' => Yii::t('app', 'Name'),
            'agency' => Yii::t('app', 'Executing Agency'),
            'dateofsanction' => Yii::t('app', 'Date of Sanction'),
            'dateoffundsreceipt' => Yii::t('app', 'Date of Funds Receipt'),
            'dateofstart' => Yii::t('app', 'Date of Start'),
            'totvalue' => Yii::t('app', 'Total Cost'),
            'dept_id' => Yii::t('app', 'Dept ID'),
            'work_type_id' => Yii::t('app', 'Type of Work'),
            'address' => Yii::t('app', 'Address'),
            'gpslat' => Yii::t('app', 'Latitude(decimal format)'),
            'gpslong' => Yii::t('app', 'Longitude(decimal format)'),
            'loc' => Yii::t('app', 'Location(GPS point in decimal,decimal format)'),
            'status' => Yii::t('app', 'Status'),
            'scheme_id' => Yii::t('app', 'Name of Scheme'),
            'work_admin' => Yii::t('app', 'Work Admin'),
            'fromloc' => Yii::t('app', 'Starting Location(decimal,decimal format)'),
            'toloc' => Yii::t('app', 'End Location(decimal,decimal format)'),
            'substation_id' => Yii::t('app', 'Substation'),
            'division_id' => Yii::t('app', 'Division'),
			'feeder_id'=>Yii::t('app','Feeder'),
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
    public function getWorkProgressLatest()
    {
        return WorkProgress::find()->where ('work_id ='.$this->id)
		     ->orderBy('dateofprogress desc')->limit(1);
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
	public function display($form,$attribute)
	{
		switch ($attribute)
		  {
			case 'feeder_id':
				//return $form->field($this,$attribute)->dropDownList(\yii\helpers\ArrayHelper::map
				//(\app\models\Feeder::find()->asArray()->all(),'id','name_en'));
				return $form->field($this,$attribute)->widget(\app\widgets\FeederWidget::classname());
				break;
			case 'address':
			case 'gpslat':
			case 'gpslong':
			case 'fromloc':
			case 'toloc':
				return $form->field($this,$attribute)->textInput();
				break;
			case 'substation_id':
				return $form->field($this,$attribute)->dropDownList(\yii\helpers\ArrayHelper::map
				(\app\models\Substation::find()->where($this->division_id?'division_id='.$this->division_id:'true')->asArray()->all(),'id','name_en'));
				break;
				
			
		  }
	}
}
