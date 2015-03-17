<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Substation */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="substation-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'shortcode')->textInput(['maxlength' => 7]) ?>

    <?= $form->field($model, 'name_hi')->textInput(['class'=>'hindiinput form-control','maxlength' => 50]) ?>

    <?= $form->field($model, 'name_en')->textInput(['maxlength' => 50]) ?>

    <?= $form->field($model, 'type')->dropDownList(\app\models\Substation::$types) ?>

    
    <?= $form->field($model, 'division_id')->widget(\app\widgets\DivisionWidget::classname()) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
