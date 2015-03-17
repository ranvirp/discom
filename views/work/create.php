<?php

use kartik\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Work */

$this->title = 'Create Work';
$this->params['breadcrumbs'][] = ['label' => 'Works', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="work-create">

   <?=   Html::Panel(['heading'=>Html::encode($this->title),'body'=>$this->render('_form_1', [
        'model' => $model,
    ]) ],Html::TYPE_WARNING)
	   ?>

</div>
