<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\slider\Slider;
use kartik\widgets\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\WorkProgress */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="work-progress-form">

    <?php $form = ActiveForm::begin(); ?>
	<div class="col-md-3">

    <?= $form->field($model, 'work_id')->dropDownList(
\yii\helpers\ArrayHelper::map(\app\models\Work::find()->asArray()->all(),'id','name_'.Yii::$app->language)) ?>
	</div>
	<div class="col-md-1">
    <?= $form->field($model, 'physical')->widget(Slider::classname(), [
'pluginOptions'=>[
'min'=>0,
'max'=>100,
'step'=>1
]
]); ?>
	</div>
	<div class="col-md-1">
    <?= $form->field($model, 'financial')->widget(Slider::classname(), [
'pluginOptions'=>[
'min'=>0,
'max'=>100,
'step'=>1
]
]); ?>
	</div>
	<div class="col-md-2">
    <?= $form->field($model, 'dateofprogress')->widget(DatePicker::classname(), [
'options' => ['placeholder' => 'Enter Date of Progress...'],
'pluginOptions' => [
'autoclose'=>true
]
]); ?>
	</div>
	<div class="col-md-4">
    <?= $form->field($model, 'remarks')->textarea(['rows' => 6]) ?>
	</div>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
