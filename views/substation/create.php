<?php

use kartik\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Substation */

$this->title = Yii::t('app', 'Create {modelClass}', [
    'modelClass' => 'Substation',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Substations'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="substation-create">
<?=   Html::Panel(['heading'=>Html::encode($this->title),'body'=>$this->render('_form', [
        'model' => $model,
    ]) ],Html::TYPE_WARNING)
	   ?>
</div>
