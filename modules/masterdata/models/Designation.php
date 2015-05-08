<?php
namespace app\modules\masterdata\models;

use Yii;

/**
 * This is the model class for table "designation".
 *
 * @property integer $id
 * @property integer $designation_type_id
 * @property integer $level_id
 * @property string $officer_name_hi
 * @property string $officer_name_en
 * @property string $officer_mobile
 * @property string $officer_mobile1
 * @property string $officer_email
 * @property string $officer_userid
 *
 * @property DesignationType $designationType
 * @property Work[] $works
 */
class Designation extends \app\common\MyActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'designation';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['designation_type_id', 'level_id','officer_userid'], 'integer'],
            [['officer_name_hi', 'officer_name_en'], 'string', 'max' => 100],
            [['officer_mobile', 'officer_mobile1'], 'string', 'max' => 12],
            [['officer_email'], 'string', 'max' => 50],
           // [['officer_userid'], 'string', 'max' => 10]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'designation_type_id' => Yii::t('app', 'Designation Type'),
            'level_id' => Yii::t('app', 'Level ID'),
            'officer_name_hi' => Yii::t('app', 'Officer Name in Hindi'),
            'officer_name_en' => Yii::t('app', 'Officer Name in English'),
            'officer_mobile' => Yii::t('app', 'Officer Mobile'),
            'officer_mobile1' => Yii::t('app', 'Officer Mobile1'),
            'officer_email' => Yii::t('app', 'Officer Email'),
            'officer_userid' => Yii::t('app', 'Officer Userid'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDesignationType()
    {
        return $this->hasOne(DesignationType::className(), ['id' => 'designation_type_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWorks()
    {
        return $this->hasMany(Work::className(), ['work_admin' => 'id']);
    }
	/*
	*@return form of individual elements
	*/
	public function showForm($form,$attribute)
	{
		switch ($attribute)
		  {
		   
									
			case 'id':
			   return  $form->field($this,$attribute)->textInput();
			    
			    break;
									
			case 'designation_type_id':
			   return  $form->field($this,$attribute)->dropDownList(\yii\helpers\ArrayHelper::map(DesignationType::find()->asArray()->all(),"id","name_".Yii::$app->language));
			    
			    break;
									
			case 'level_id':
			   return  $form->field($this,$attribute)->textInput();
			    
			    break;
									
			case 'officer_name_hi':
			   return  $form->field($this,$attribute)->textInput();
			    
			    break;
									
			case 'officer_name_en':
			   return  $form->field($this,$attribute)->textInput();
			    
			    break;
									
			case 'officer_mobile':
			   return  $form->field($this,$attribute)->textInput();
			    
			    break;
									
			case 'officer_mobile1':
			   return  $form->field($this,$attribute)->textInput();
			    
			    break;
									
			case 'officer_email':
			   return  $form->field($this,$attribute)->textInput();
			    
			    break;
									
			case 'officer_userid':
			   return  $form->field($this,$attribute)->textInput();
			    
			    break;
			 
			default:
			break;
		  }
    }
	/*
	*@return form of individual elements
	*/
	public function showValue($attribute)
	{
	    $name='name_'.Yii::$app->language;
		switch ($attribute)
		  {
		   
									
			case 'id':
			   return $this->id;			    break;
									
			case 'designation_type_id':
			   return DesignationType::findOne($this->designation_type_id)->$name;			    break;
									
			case 'level_id':
			   return $this->level_id;			    break;
									
			case 'officer_name_hi':
			   return $this->officer_name_hi;			    break;
									
			case 'officer_name_en':
			   return $this->officer_name_en;			    break;
									
			case 'officer_mobile':
			   return $this->officer_mobile;			    break;
									
			case 'officer_mobile1':
			   return $this->officer_mobile1;			    break;
									
			case 'officer_email':
			   return $this->officer_email;			    break;
									
			case 'officer_userid':
			   return $this->officer_userid;			    break;
			 
			default:
			break;
		  }
    }
 /*
    */
    public function getDesignationtypes()
    {
      return \app\modules\masterdata\models\DesignationType::findOne($this->designation_type_id);
    }
    public function getLevel()
    {
      $classname= $this->designationType->level->class_name;
      return $classname::findOne($this->level_id);
    }
    public function createUserAndRole()
     {
        $role=$this->designationType->shortcode;
        $username=$role.'_'.$this->level->name_en;
        $auth = Yii::$app->authManager;
        $username=preg_replace("/\s+/","",$username);
        $username=strtolower($username);
        
		if (!($rolecreated=$auth->getRole($role)))
		{
        // add "author" role and give this role the "createPost" permission
           $rolecreated= $auth->createRole($role);
		   $auth->add($rolecreated);
		}
		$userclass=Yii::$app->getModule('user')->modelClasses['User'];
		$usermodel=$userclass::find()->where('username=:username',[':username'=>$username])->one();
		//$usermodel=null;
		if ($usermodel) 
		   return;//do nothing, user already exists
		   //$usermodel->delete();
		     $usermodel=new $userclass;
		     $usermodel->username=$username;
		     $usermodel->newPassword=$username;
		     $usermodel->email=$username.'@test.com';
		     $usermodel->role_id=2;
		     $usermodel->status=1;
		     if (!$usermodel->save())
		      {
		        print_r($usermodel->errors);
		        exit;
		      }
		      else {
		      //$this=Designation::findOne($this->id);
		     // $desig->officer_userid=$usermodel->id;
		     $this->officer_userid=$usermodel->id;
		     // print_r($desig);
		      //exit;
		     if (! $this->save())
		      {
		        print_r($this->errors);exit;
		      }
		      }
		   
     }
     public function beforeSave($insert)
     {
       $this->name_en=$this->designationType->name_en.' '.$this->level->name_en;
       $this->name_hi=$this->designationType->name_hi.' '.$this->level->name_hi;
       return parent::beforeSave($insert);
       
     }
	
}
