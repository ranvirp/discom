<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\FeederSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Feeders');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="feeder-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create {modelClass}', [
    'modelClass' => 'Feeder',
]), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'shortcode',
            'name_en',
            'circle_id',
            'substation_id',
            // 'substation_name',
            // 'pwtrfcty',
            // 'pwtrfid',
            // 'typeofconductor',
            // 'peakdemand',
            // 'transformerdesc',
            // 'totalcapacity',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
