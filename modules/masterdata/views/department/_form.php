<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use app\common\Utility;

/* @var $this yii\web\View */
/* @var $model app\modules\masterdata\models\Department */
/* @var $form yii\widgets\ActiveForm */
?>
<?php
 
 
$this->registerJs(
   '$("document").ready(function(){ 
        $("#new_department").on("pjax:end", function() {
            $.pjax.reload({container:"#departments"});  //Reload GridView
        });
    });'
);
?>
<h3>Form for creating department</h3>
<div class="bordered-form department-form">

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

<?php
try {
$x= Utility::rules()["app\modules\masterdata\models\Department"]["id"];
} catch (Exception $e) {$x=null;}
$modelArray=Yii::$app->request->post("Department");
		if ($x && $model && array_key_exists("id",$modelArray) && array_key_exists($modelArray["id"],$x))
		{
			$attribute_value=$modelArray["id"];
			
			foreach ($x[$attribute_value]["show"] as $field)
			{
				echo "<div class=\"row\">\n";
			
				echo $model->display($form,$field);
				echo "</div>";
			
			}
		}
?>    <?= $model->showForm($form,"name_hi") ?>

<?php
try {
$x= Utility::rules()["app\modules\masterdata\models\Department"]["name_hi"];
} catch (Exception $e) {$x=null;}
$modelArray=Yii::$app->request->post("Department");
		if ($x && $model && array_key_exists("name_hi",$modelArray) && array_key_exists($modelArray["name_hi"],$x))
		{
			$attribute_value=$modelArray["name_hi"];
			
			foreach ($x[$attribute_value]["show"] as $field)
			{
				echo "<div class=\"row\">\n";
			
				echo $model->display($form,$field);
				echo "</div>";
			
			}
		}
?>    <?= $model->showForm($form,"name_en") ?>

<?php
try {
$x= Utility::rules()["app\modules\masterdata\models\Department"]["name_en"];
} catch (Exception $e) {$x=null;}
$modelArray=Yii::$app->request->post("Department");
		if ($x && $model && array_key_exists("name_en",$modelArray) && array_key_exists($modelArray["name_en"],$x))
		{
			$attribute_value=$modelArray["name_en"];
			
			foreach ($x[$attribute_value]["show"] as $field)
			{
				echo "<div class=\"row\">\n";
			
				echo $model->display($form,$field);
				echo "</div>";
			
			}
		}
?>    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
