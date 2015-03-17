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
class DivisionWidget  extends \yii\base\Widget{
	//put your code here
	public $model;
	public $attribute;
	public function run() {
		parent::run();
		$model=$this->model;
		$attribute=$this->attribute;
		// Normal parent select
		$lang=Yii::$app->language;
		echo '<div class="row"><div class="col-md-6">';
echo \yii\helpers\Html::activeDropDownList($this->model, $this->attribute,
\yii\helpers\ArrayHelper::map(\app\models\Circle::find()->asArray()->all(),'id','name_'.$lang), ['label'=>'Select Circle','prompt'=>'None','id'=>$attribute.'-circle-id']);

// Dependent Dropdown
//echo $form->field($model, $attribute)->widget(
echo '</div><div class="col-md-6">';
echo	DepDrop::widget( [
		'model'=>$model,
		'attribute'=>$attribute,
     'options' => ['id'=>$attribute.'-id'],
     'pluginOptions'=>[
         'depends'=>[$attribute.'-circle-id'],
         'placeholder' => 'Select...',
         'url' => \yii\helpers\Url::to(['/division/get'])
     ]
 ]);
echo '</div></div>';
	}
}
