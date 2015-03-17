<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<?php $model1=new \app\models\MaterialRequirement; ?>
<div id='mrc'>
	   <span class="btn btn-success" onclick="var t=$('#row1').clone();$('#mainmrc').append(t);"><i class='fa fa-plus' ></i>Add </span>
	   <div id='mainmrc' >
		   <div class='row'>
			
		   </div>
		   
		   <div class='row' id="row1">
			   <div class='col-sm-4'>
		  <?= $form->field($model1, 'material_type[]')->dropDownList(\yii\helpers\ArrayHelper::map(
		\app\models\MaterialType::find()->asArray()->all(),'id','name_'.\Yii::$app->language),['name'=>'material_type[]']) ?>
			   </div>
			   <div class='col-sm-4'>
    <?= $form->field($model1, 'qty[]')->textInput() ?>
			   </div>
			   <div class='col-sm-4'>

    <?= $form->field($model1, 'value[]')->textInput() ?> 
			   </div>
		   </div>
	   </div>
   </div>