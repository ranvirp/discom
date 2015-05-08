<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\common\Utility;

/* @var $this yii\web\View */
/* @var $model app\modules\masterdata\models\DesignationType */
/* @var $form yii\widgets\ActiveForm */
?>
<?php
 
 
$this->registerJs(
   '$("document").ready(function(){ 
        $("#new_designation-type").on("pjax:end", function() {
            $.pjax.reload({container:"#designation-types"});  //Reload GridView
        });
    });'
);
?>
<div class="designation-type-form">

    <?php $form = ActiveForm::begin(); ?>

<?php
$x= Utility::rules()["app\modules\masterdata\models\DesignationType"]["id"];
$modelArray=Yii::$app->request->post("DesignationType");
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
?>    <?= $model->showForm($form,"level_id") ?>

<?php
$x= Utility::rules()["app\modules\masterdata\models\DesignationType"]["level_id"];
$modelArray=Yii::$app->request->post("DesignationType");
		if ($x && $model && array_key_exists("level_id",$modelArray) && array_key_exists($modelArray["level_id"],$x))
		{
			$attribute_value=$modelArray["level_id"];
			
			foreach ($x[$attribute_value]["show"] as $field)
			{
				echo "<div class=\"row\">\n";
			
				echo $model->display($form,$field);
				echo "</div>";
			
			}
		}
?>    <?= $model->showForm($form,"name_hi") ?>

<?php
$x= Utility::rules()["app\modules\masterdata\models\DesignationType"]["name_hi"];
$modelArray=Yii::$app->request->post("DesignationType");
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
$x= Utility::rules()["app\modules\masterdata\models\DesignationType"]["name_en"];
$modelArray=Yii::$app->request->post("DesignationType");
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
?>    <?= $model->showForm($form,"shortcode") ?>

<?php
$x= Utility::rules()["app\modules\masterdata\models\DesignationType"]["shortcode"];
$modelArray=Yii::$app->request->post("DesignationType");
		if ($x && $model && array_key_exists("shortcode",$modelArray) && array_key_exists($modelArray["shortcode"],$x))
		{
			$attribute_value=$modelArray["shortcode"];
			
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
