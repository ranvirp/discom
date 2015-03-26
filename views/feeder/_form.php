<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Feeder */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="feeder-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'shortcode')->textInput() ?>

    <?= $form->field($model, 'name_en')->textInput() ?>

    <?= $form->field($model, 'circle_id')->textInput() ?>

    <?= $form->field($model, 'substation_id')->textInput() ?>

    <?= $form->field($model, 'substation_name')->textInput() ?>

    <?= $form->field($model, 'pwtrfcty')->textInput() ?>

    <?= $form->field($model, 'pwtrfid')->textInput() ?>

    <?= $form->field($model, 'typeofconductor')->textInput() ?>

    <?= $form->field($model, 'peakdemand')->textInput() ?>

    <?= $form->field($model, 'transformerdesc')->textInput() ?>

    <?= $form->field($model, 'totalcapacity')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
