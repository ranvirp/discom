<?php

use kartik\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Feeder */

$this->title = Yii::t('app', 'Create {modelClass}', [
    'modelClass' => 'Feeder',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Feeders'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="feeder-create">
<?=   Html::Panel(['heading'=>Html::encode($this->title),'body'=>$this->render('_form', [
        'model' => $model,
    ]) ],Html::TYPE_WARNING)
	   ?>
</div>
