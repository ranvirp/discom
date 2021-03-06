<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\FeederSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="feeder-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'shortcode') ?>

    <?= $form->field($model, 'name_en') ?>

    <?= $form->field($model, 'circle_id') ?>

    <?= $form->field($model, 'substation_id') ?>

    <?php // echo $form->field($model, 'substation_name') ?>

    <?php // echo $form->field($model, 'pwtrfcty') ?>

    <?php // echo $form->field($model, 'pwtrfid') ?>

    <?php // echo $form->field($model, 'typeofconductor') ?>

    <?php // echo $form->field($model, 'peakdemand') ?>

    <?php // echo $form->field($model, 'transformerdesc') ?>

    <?php // echo $form->field($model, 'totalcapacity') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
