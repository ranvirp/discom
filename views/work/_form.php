<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\DatePicker;
use kartik\money\MaskMoney;

/* @var $this yii\web\View */
/* @var $model app\models\Work */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="work-form">

    <?php $form = ActiveForm::begin(); ?>
	<div class="row">
		<div class="col-lg-6">
    <?= $form->field($model, 'name_hi')->textInput(['size' => 50,'class'=>'col-lg-12 hindiinput']) ?>
		</div>
		<div class="col-lg-6">

    <?= $form->field($model, 'name_en')->textInput(['size' => 50]) ?>
		</div>
		</div>
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
    <?= $form->field($model, 'totvalue')->widget(MaskMoney::classname()) ?>
	 <?= $form->field($model, 'status')->dropDownList(\app\models\Work::status()) ?>

   
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
