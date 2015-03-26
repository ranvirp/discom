<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Substation */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Substations'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="substation-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'shortcode',
            'name_hi',
            'name_en',
            'type',
            'documents:ntext',
            'division_id',
            'je_area_id',
            'voltageratio',
            'mva',
            'notrf',
            'capacity',
            'mvamax',
            'mvarmax',
            'remarks:ntext',
            'circle_id',
        ],
    ]) ?>

</div>
