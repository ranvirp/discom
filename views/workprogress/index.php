<?php

use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Work Progresses';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="work-progress-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Work Progress', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
[
    'class'=>'kartik\grid\ExpandRowColumn',
    'width'=>'50px',
    'value'=>function ($model, $key, $index, $column) {
        return GridView::ROW_COLLAPSED;
    },
    'detail'=>function ($model, $key, $index, $column) {
        return Yii::$app->controller->renderPartial('_form_1', ['model'=>$model]);
    },
    'headerOptions'=>['class'=>'kartik-sheet-style'] 
    //'disabled'=>true,
    //'detailUrl'=>Url::to(['/site/test-expand'])
],
            'id',
		[ 'header'=>'Date of Report',
			'value'=>function($model,$key,$index,$column)
	             {  
		            $date = new DateTime($model->dateofprogress);
		            return $date->format('Y-m-d');
	             },
			],
            'work_id',
            'physical',
            'financial',
            
            'remarks:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
