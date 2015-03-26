<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\DatePicker;
use kartik\money\MaskMoney;
use yii\bootstrap\Tabs;

/* @var $this yii\web\View */
/* @var $model app\models\Work */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="work-form">

    <?php $form = ActiveForm::begin(); ?>
	<div role="tabpanel">

  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#basicinfo" aria-controls="basicinfo" role="tab" data-toggle="tab">Basic Info</a></li>
    <li role="presentation"><a href="#matreq" aria-controls="matreq" role="tab" data-toggle="tab">Material Requirement</a></li>
  </ul>
  <div class='tab-content'>
	  <div class='tab-pane active' role='tabpanel' id='basicinfo'>
		  <div class="row">
			  <?=$form->field($model,'scheme_id')->dropDownList(
                 \yii\helpers\ArrayHelper::map(\app\models\Scheme::find()->asArray()->all(),'id','name_en'))?>
		  </div>
	<div class="row">
		<div class="col-lg-4">
    <?= $form->field($model, 'name_hi')->textInput(['size' => 50,'class'=>'col-lg-12 hindiinput']) ?>
		</div>
		<div class="col-lg-4">
    <?= $form->field($model, 'name_en')->textInput(['size' => 50]) ?>
	
   	</div>
		<div class='col-lg-4'>
			    <?= $form->field($model, 'totvalue')->widget(MaskMoney::classname()) ?>
	
		   </div>
		</div>
		<div class="row">
		<div class="col-lg-4">
 <?= $form->field($model, 'work_type_id')->dropDownList(\yii\helpers\ArrayHelper::map(
	\app\models\WorkType::find()->asArray()->all(),'id','name_'.Yii::$app->language)) ?>
		</div>
		<div class="col-lg-4">
    <?= $form->field($model, 'agency')->dropDownList(\yii\helpers\ArrayHelper::map(
	\app\models\Agency::find()->asArray()->all(),'id','name_'.Yii::$app->language)) ?>
		</div>
		<div class="col-lg-4">
			  <?= $form->field($model, 'dept_id')->dropDownList(\yii\helpers\ArrayHelper::map(
	\app\models\Department::find()->asArray()->all(),'id','name_'.Yii::$app->language)) ?>

		</div>
		</div>
	<div class='col-md-6 small'>
	
	<div class="row">
		<div class="col-lg-12">
			 <?= $form->field($model, 'address')->textInput(['size' => 50]) ?>
	
		</div>
	</div>
	<div class="row">
		<div class="col-lg-6">
			 <?= $form->field($model, 'gpslat')->textInput(['size' => 50]) ?>
	
		</div>
		<div class="col-lg-6">
			 <?= $form->field($model, 'gpslong')->textInput(['size' => 50]) ?>
	
		</div>
	</div>
	</div>
		<div role='tabpanel' class='tab-pane' id='otherdetails'>
		<div class="row">
		<div class="col-lg-12">
			 <?= $form->field($model, 'work_admin')->widget(\app\widgets\DesignationWidget::classname()) ?>
	
		</div>
		
	</div>


   	</div>
	<div class='col-md-6 small'>
			<div class="row">
		<div class="col-lg-4">
    <?= $form->field($model, 'dateofsanction')->widget(DatePicker::classname(), [
'options' => ['placeholder' => 'Enter Date of Sanction ...'],
'pluginOptions' => [
'autoclose'=>true
]
]); ?>
	</div>
<div class="col-lg-4">
    <?= $form->field($model, 'dateoffundsreceipt')->widget(DatePicker::classname(), [
'options' => ['placeholder' => 'Enter Date of Receipt of Funds ...'],
'pluginOptions' => [
'autoclose'=>true
]
]); ?>
	</div>
<div class="col-lg-4">
    <?= $form->field($model, 'dateofstart')->widget(DatePicker::classname(), [
'options' => ['placeholder' => 'Enter Date of Start of Work ...'],
'pluginOptions' => [
'autoclose'=>true
]
]); ?>
	</div>
	</div>
	</div>
   <?= $form->field($model, 'status')->dropDownList(\app\models\Work::status()) ?>
		

   </div>
	  </div>
  
  <div role='tabpanel' class='tab-pane' id='matreq'>
	  <?=$this->render('matreq.php',['form'=>$form]
		  //,['models'=>$matmodels] //TODO
		  );
?>
  </div>
	</div>
	</div>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
