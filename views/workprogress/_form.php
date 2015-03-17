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

    <?= $form->field($model, 'work_id')->dropDownList(
\yii\helpers\ArrayHelper::map(\app\models\Work::find()->asArray()->all(),'id','name_'.Yii::$app->language)) ?>

    <?= $form->field($model, 'physical')->widget(Slider::classname(), [
'pluginOptions'=>[
'min'=>0,
'max'=>100,
'step'=>1
]
]); ?>

    <?= $form->field($model, 'financial')->widget(Slider::classname(), [
'pluginOptions'=>[
'min'=>0,
'max'=>100,
'step'=>1
]
]); ?>

    <?= $form->field($model, 'dateofprogress')->widget(DatePicker::classname(), [
'options' => ['placeholder' => 'Enter Date of Progress...'],
'pluginOptions' => [
'autoclose'=>true
]
]); ?>

    <?= $form->field($model, 'remarks')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
