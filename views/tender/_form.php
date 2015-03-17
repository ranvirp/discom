<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\DatePicker;
use kartik\file\FileInput;


/* @var $this yii\web\View */
/* @var $model app\models\Tender */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tender-form">
 
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'work_id')->dropDownList(\yii\helpers\ArrayHelper::map(
	\app\models\Work::find()->asArray()->all(),'id','name_'.Yii::$app->language)) ?>

    	<div class="row">
		<div class="col-lg-4">
    <?= $form->field($model, 'dateofpub')->widget(DatePicker::classname(), [
'options' => ['placeholder' => 'Enter Date of Sanction ...'],
'pluginOptions' => [
'autoclose'=>true
]
]); ?>
	</div>
<div class="col-lg-4">
    <?= $form->field($model, 'dateofopening')->widget(DatePicker::classname(), [
'options' => ['placeholder' => 'Enter Date of Receipt of Funds ...'],
'pluginOptions' => [
'autoclose'=>true
]
]); ?>
	</div>
<div class="col-lg-4">
    <?= $form->field($model, 'dateofworkorder')->widget(DatePicker::classname(), [
'options' => ['placeholder' => 'Enter Date of Start of Work ...'],
'pluginOptions' => [
'autoclose'=>true
]
]); ?>
	</div>
	</div>
	<div class="row">
		<div class="col-lg-12">
<?php 
echo $form->field($model,'attachments')->widget(\app\widgets\FileWidget::className());
?>
		</div>
	</div>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
