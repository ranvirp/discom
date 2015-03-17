<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Designations';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="designation-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Designation', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'designation_type_id',
            'level_id',
            'officer_name_hi',
            'officer_name_en',
            // 'officer_mobile',
            // 'officer_mobile1',
            // 'officer_email:email',
            // 'officer_userid',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
