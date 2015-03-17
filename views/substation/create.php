<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Substation */

$this->title = 'Create Substation';
$this->params['breadcrumbs'][] = ['label' => 'Substations', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="substation-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
