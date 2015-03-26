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

    <?= $form->field($model, 'name_hi')->textInput(['maxlength' => 50]) ?>

    <?= $form->field($model, 'name_en')->textInput(['maxlength' => 50]) ?>

    <?= $form->field($model, 'type')->textInput() ?>

    <?= $form->field($model, 'documents')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'division_id')->textInput() ?>

    <?= $form->field($model, 'je_area_id')->textInput() ?>

    <?= $form->field($model, 'voltageratio')->textInput(['maxlength' => 30]) ?>

    <?= $form->field($model, 'mva')->textInput(['maxlength' => 20]) ?>

    <?= $form->field($model, 'notrf')->textInput() ?>

    <?= $form->field($model, 'capacity')->textInput() ?>

    <?= $form->field($model, 'mvamax')->textInput() ?>

    <?= $form->field($model, 'mvarmax')->textInput() ?>

    <?= $form->field($model, 'remarks')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'circle_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
