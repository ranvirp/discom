<?php

use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\masterdata\models\DepartmentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Departments');
$this->params['breadcrumbs'][] = $this->title;
?>
<?php if ($model!=null):?><div class="col-lg-6">
<?=$this->render('_form',['model'=>$model]) ?></div>
<div class="col-lg-6">
<?php else:?><div class="col-lg-12">
<?php endif;?><div class="department-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'kartik\grid\SerialColumn'],

['header'=>'id',
'value'=>function($model,$key,$index,$column)
{
                return $model->showValue('id');
},],['header'=>'name_hi',
'value'=>function($model,$key,$index,$column)
{
                return $model->showValue('name_hi');
},],['header'=>'name_en',
'value'=>function($model,$key,$index,$column)
{
                return $model->showValue('name_en');
},],
            ['class' => 'kartik\grid\ActionColumn'],
        ],
        'tableOptions'=>['class'=>'small'],
    'containerOptions' => ['style'=>'overflow: auto','id'=>'works'], // only set when $responsive = false
    'headerRowOptions'=>['class'=>'kartik-sheet-style'],
    'filterRowOptions'=>['class'=>'kartik-sheet-style'],
    'pjax' => true, 
    'toolbar' => [
    ['content'=>''
    //Html::button('<i class="glyphicon glyphicon-plus"></i>', ['type'=>'button', 'title'=>Yii::t('app', 'Add Progress'), 'class'=>'btn btn-success', 'onclick'=>'alert("This will launch the progress updation form");']) . ' '.
    //Html::a('<i class="glyphicon glyphicon-repeat"></i>', ['grid-demo'], ['data-pjax'=>0, 'class' => 'btn btn-default', 'title'=>Yii::t('app', 'Reset Grid')])
    ],
    //'{export}',
    //'{toggleData}',
    ],
    // set export properties
    'export' => [
    'fontAwesome' => true
    ],
    // parameters from the demo form
    'bordered' => true,
    'striped' => true,
    'condensed' => true,
    'responsive' => true,
    'hover' => true,
    'showPageSummary' => true,
    'panel' => [
            'heading' => '<h3 class="panel-title"><i class="glyphicon glyphicon-globe"></i> List of departments' . '</h3>',
            'type' => 'success',
           // 'before' => Html::a('<i class="glyphicon glyphicon-plus"></i> Create department', ['create'], ['class' => 'btn btn-success']).'<h3>'.''.'</h3>',
            'after' => Html::a('<i class="glyphicon glyphicon-repeat"></i> Reset Grid', ['/Department'], ['class' => 'btn btn-info']),
            'footer' => false
        ],
    ]); ?>

</div>
</div>