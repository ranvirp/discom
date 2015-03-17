<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\masterdata\models\Designation */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="designation-form">
    <?php 
	   $lang=Yii::$app->language;
	   $url = \yii\helpers\Url::to(['/masterdata/utility?at=glt&id=']);
	   $id='level-id';
	   $users= \yii\helpers\ArrayHelper::map(\app\models\User::find()->asArray()->all(),'id','username');
	
	?>
    <?php $form = ActiveForm::begin(); ?>
    <?php $items = \yii\helpers\ArrayHelper::map(\app\modules\masterdata\models\DesignationType::find()->asArray()->all(),'id','name_'.$lang);?>
    <div class='row'>
		<div class='col-md-6'>
	<?= $form->field($model, 'designation_type_id')->dropDownList($items,['prompt'=>'None','onClick'=>'js:populateDropdown("'.$url.'"+$(this).val(),"'.$id.'")']) ?>
		</div>
		<div class='col-md-6'>
    <?= $form->field($model, 'level_id')->dropDownList(['None'],['id'=>'level-id','prompt'=>'None']) ?>
	</div>
	</div>
	<div class='row'>
		<div class='col-md-6'>
    <?= $form->field($model, 'officer_name_hi')->textInput(['maxlength' => 100,'class'=>'hindiinput form-control']) ?>
		</div>
		<div class='col-md-6'>
    <?= $form->field($model, 'officer_name_en')->textInput(['maxlength' => 100]) ?>
	</div>
	</div>
	<div class='row'>
		<div class='col-md-4'>
    <?= $form->field($model, 'officer_mobile')->textInput(['maxlength' => 12]) ?>
		</div>
			<div class='col-md-4'>
    <?= $form->field($model, 'officer_mobile1')->textInput(['maxlength' => 12]) ?>
</div>
		
				<div class='col-md-4'>
    <?= $form->field($model, 'officer_email')->textInput(['maxlength' => 50]) ?>
	</div>
		</div>
		
    <?= $form->field($model, 'officer_userid')->dropDownList($users,['maxlength' => 10]) ?>
    
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
