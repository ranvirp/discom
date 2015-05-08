<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\common\Utility;

/* @var $this yii\web\View */
/* @var $model app\modules\masterdata\models\Level */
/* @var $form yii\widgets\ActiveForm */
?>
<?php
 
 
$this->registerJs(
   '$("document").ready(function(){ 
        $("#new_level").on("pjax:end", function() {
            $.pjax.reload({container:"#levels"});  //Reload GridView
        });
    });'
);
?>
<div class="level-form">

    <?php $form = ActiveForm::begin(); ?>

<?php
try{
$x= Utility::rules()["app\modules\masterdata\models\Level"]["id"];
}catch(Exception $e){$x=null;}
$modelArray=Yii::$app->request->post("Level");
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
?>    <?= $model->showForm($form,"class_name") ?>

<?php
try{
$x= Utility::rules()["app\modules\masterdata\models\Level"]["class_name"];
}catch(Exception $e){$x=null;}

$modelArray=Yii::$app->request->post("Level");
		if ($x && $model && array_key_exists("class_name",$modelArray) && array_key_exists($modelArray["class_name"],$x))
		{
			$attribute_value=$modelArray["class_name"];
			
			foreach ($x[$attribute_value]["show"] as $field)
			{
				echo "<div class=\"row\">\n";
			
				echo $model->display($form,$field);
				echo "</div>";
			
			}
		}
?>    <?= $model->showForm($form,"dept_id") ?>

<?php
try{
$x= Utility::rules()["app\modules\masterdata\models\Level"]["dept_id"];
}catch(Exception $e){$x=null;}

$modelArray=Yii::$app->request->post("Level");
		if ($x && $model && array_key_exists("dept_id",$modelArray) && array_key_exists($modelArray["dept_id"],$x))
		{
			$attribute_value=$modelArray["dept_id"];
			
			foreach ($x[$attribute_value]["show"] as $field)
			{
				echo "<div class=\"row\">\n";
			
				echo $model->display($form,$field);
				echo "</div>";
			
			}
		}
?>    <?= $model->showForm($form,"name_hi") ?>

<?php
try
{
$x= Utility::rules()["app\modules\masterdata\models\Level"]["name_hi"];
}catch(Exception $e){$x=null;}
$modelArray=Yii::$app->request->post("Level");
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
try{
$x= Utility::rules()["app\modules\masterdata\models\Level"]["name_en"];
} catch(Exception $e) {$x=null;}
$modelArray=Yii::$app->request->post("Level");
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
