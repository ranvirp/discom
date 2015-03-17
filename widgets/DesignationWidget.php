<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\widgets;
use Yii;
use kartik\depdrop\DepDrop;
/**
 * Description of DivisionWidget
 *
 * @author mac
 */
class DesignationWidget  extends \yii\base\Widget{
	//put your code here
	public $model;
	public $attribute;
	public $name='';
	public function run() {
		parent::run();
		$model=$this->model;
		$attribute=$this->attribute;
		// Normal parent select
		$lang=Yii::$app->language;
		echo '<div class="row"><div class="col-lg-6">';
		if ($this->name=='')
           echo \yii\helpers\Html::activeDropDownList($this->model, $this->attribute,
           \yii\helpers\ArrayHelper::map(\app\models\DesignationType::find()->asArray()->all(),'id','name_'.$lang), ['id'=>$attribute.'-designation-type-id','prompt'=>'-Select-']);
        else 
	       echo \yii\helpers\Html::dropDownList($this->name,
           \yii\helpers\ArrayHelper::map(\app\models\DesignationType::find()->asArray()->all(),'id','name_'.$lang), ['id'=>$this->name.'-designation-type-id','prompt'=>'-Select-']);

	echo '</div><div class="col-lg-6">';
// Dependent Dropdown
//echo $form->field($model, $attribute)->widget(
		if ($this->name=='')
echo	DepDrop::widget( [
	'type'=>2,
		'model'=>$model,
		'attribute'=>$attribute,
        'options' => ['id'=>$attribute.'-id'],
        'pluginOptions'=>[
        'depends'=>[$attribute.'-designation-type-id'],
         'placeholder' => 'Select...',
         'url' => \yii\helpers\Url::to(['/masterdata/utility?at=gltk'])
     ]
 ]);
		else 
			echo DepDrop::widget( [
				'type'=>2,
		'name'=>$name,
		'value'=>$value,
        'options' => ['id'=>$this->name.'-id'],
        'pluginOptions'=>[
        'depends'=>[$this->name.'-designation-type-id'],
         'placeholder' => 'Select...',
         'url' => \yii\helpers\Url::to(['/masterdata/utility?at=gltk'])
     ]
 ]);
			    
echo '</div></div>';
	}
}
