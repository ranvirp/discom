<?php

use kartik\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Division */

$this->title = Yii::t('app', 'Create {modelClass}', [
    'modelClass' => 'Division',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Divisions'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="division-create">
<?=   Html::Panel(['heading'=>Html::encode($this->title),'body'=>$this->render('_form', [
        'model' => $model,
    ]) ],Html::TYPE_WARNING)
	   ?>
</div>
