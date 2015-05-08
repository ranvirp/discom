<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use app\common\Utility;

/* @var $this yii\web\View */
/* @var $model app\models\Work */
/* @var $form yii\widgets\ActiveForm */
?>
<?php
 
 $changeattribute='work_type_id';
$this->registerJs(
   '$("document").ready(function(){ 
        $("#new_work").on("pjax:end", function() {
            $.pjax.reload({container:"#works"});  //Reload GridView
        });
    });'
);
?>
<h3>Form for creating work</h3>
<div class="bordered-form work-form">

    <?php $form = ActiveForm::begin([
    'layout' => 'horizontal',
    'fieldConfig' => [
        'template' => "{label}\n{beginWrapper}\n{input}\n{hint}\n{error}\n{endWrapper}",
        'horizontalCssClasses' => [
            'label' => 'col-sm-4',
            'offset' => 'col-sm-offset-4',
            'wrapper' => 'col-sm-8',
            'error' => '',
            'hint' => '',
        ],
    ],
]); ?>
     <?= $model->showForm($form,"scheme_id") ?>
      <?= $model->showForm($form,"work_id") ?>

    <?= $model->showForm($form,"name_hi") ?>

    <?= $model->showForm($form,"name_en") ?>
    
    <?= $model->showForm($form,"division_id") ?>

   <?= $model->showForm($form,"substation_id") ?>

    <?= $model->showForm($form,"agency") ?>
    <?= $model->showForm($form,"totvalue") ?>


    <?= $model->showForm($form,"dateofsanction") ?>

    <?= $model->showForm($form,"dateoffundsreceipt") ?>

    <?= $model->showForm($form,"dateofstart") ?>

    <?= $model->showForm($form,"dept_id") ?>

    <?= $model->showForm($form,"work_type_id") ?>

    <?= $model->showForm($form,"address") ?>

    <?= $model->showForm($form,"gpslat") ?>

    <?= $model->showForm($form,"gpslong") ?>

    
    <?= $model->showForm($form,"status") ?>

   
    <?= $model->showForm($form,"work_admin") ?>

    <?= $model->showForm($form,"remarks") ?>


<?php
try {
$x= Utility::rules()["app\models\Work"][$changeattribute];
} catch (Exception $e) {$x=null;}
$modelArray=Yii::$app->request->post("Work");
		if ($x && $model && array_key_exists($changeattribute,$modelArray) && array_key_exists($modelArray[$changeattribute],$x))
		{
			$attribute_value=$modelArray[$changeattribute];
			
			foreach ($x[$attribute_value]["show"] as $field)
			{
			  
			//	echo "<div class=\"row\">\n";
			
				echo $model->showForm($form,$field);
				//echo "</div>";
			
			}
		}
?>    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
