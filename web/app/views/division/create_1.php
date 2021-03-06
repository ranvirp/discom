<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Division */

$this->title = Yii::t('app', 'Create {modelClass}', [
    'modelClass' => 'Division',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Divisions'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="division-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
