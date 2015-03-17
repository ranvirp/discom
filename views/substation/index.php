<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Substations';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="substation-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Substation', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'shortcode',
            'name_hi',
            'name_en',
            'type',
            // 'documents:ntext',
            // 'division_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
