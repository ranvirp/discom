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
		<div class="col-lg-5">
 <?= $form->field($model, 'work_type_id')->dropDownList(\yii\helpers\ArrayHelper::map(
	\app\models\WorkType::find()->asArray()->all(),'id','name_'.Yii::$app->language),
	 ['prompt'=>'None','onChange'=>'this.form.submit()']) ?>
		</div>
		 <div class="col-lg-4">
			  <?=$form->field($model,'scheme_id')->dropDownList(
                 \yii\helpers\ArrayHelper::map(\app\models\Scheme::find()->asArray()->all(),'id','name_en'),['prompt'=>'None'])?>
			
			  </div>
		<div class="col-lg-3">
				 <?= $form->field($model,'division_id')->dropDownList(
                 \yii\helpers\ArrayHelper::map(\app\models\Division::find()->asArray()->all(),'id','name_en'),['prompt'=>'None'])?>
			  </div>
			 
	</div>
	<div class="row">
		<div class="row">
			  
		  <div class="col-lg-3">
    <?= $form->field($model, 'work_id')->textInput(['size' => 100]) ?>
	
   	</div>
			  <div class="col-lg-6">
    <?= $form->field($model, 'name_en')->textInput(['size' => 50]) ?>
		</div>
			  <div class='col-lg-3'>
			    <?= $form->field($model, 'totvalue')->textInput() ?>
	
		   </div>
	</div>
		<?php
		$work=Yii::$app->request->post('Work');
		if ($work && array_key_exists('work_type_id',$work) && array_key_exists($work['work_type_id'],$x))
		{
			$work_type_id=$work['work_type_id'];
			
			foreach ($x[$work_type_id]['show'] as $field)
			{
				echo '<div class="row">';
			
				echo $model->display($form,$field);
				echo '</div>';
			
			}
		}	
   ?>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
</div>
