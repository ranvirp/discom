<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\DesignationType */

$this->title = 'Create Designation Type';
$this->params['breadcrumbs'][] = ['label' => 'Designation Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="designation-type-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
