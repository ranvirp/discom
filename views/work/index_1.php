<?php

use yii\helpers\Html;
//use yii\grid\GridView;
use \kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Works';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="work-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Work', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php 
	$gridColumns = [
            ['class' => '\kartik\grid\SerialColumn'],

            
            'name_'.Yii::$app->language.':ntext',
		 ['header'=>'Work Type','value'=>function($model,$key,$index,$column){
		$name='name_'.Yii::$app->language;
		return $model->workType?$model->workType->$name:'';}],
			'address',
            ['header'=>'Agency','value'=>function($model,$key,$index,$column)
	{ $name='name_'.Yii::$app->language;return $model->agency0?$model->agency0->$name:'';},],
           
			['header'=>'Department','value'=>function($model,$key,$index,$column){
		$name='name_'.Yii::$app->language;
		return $model->dept?$model->dept->$name:'';}],
			'totvalue',
			'dateofsanction',
            'dateoffundsreceipt',
             'dateofstart',
			['header'=>'Tender Details',
		      'value'=>
function($model,$key,$index,$column){
		$name='name_'.Yii::$app->language;
		$x="<table class='table table-striped small'>";
		$x.='<tr><th>Name and No</th><th>Date of Publication</th><th>Date of Opening</th>'.
			'<th>Date of Work Order</th></tr>';
		foreach ($model->tenders as $tender)
		{
			$x.='<tr><td>'.$tender->nameandno.'</td><td>'.$tender->dateofpub.'</td><td>'.
				$tender->dateofopening.'</td><td>'.$tender->dateofworkorder.'</td></tr>';
		}
		$x.='</table>';
		return $x;},'format'=>'html'],				
             
            // 'dept_id',
            
            
            // 'gpslat',
            // 'gpslong',
            // 'loc',

            ['class' => '\kartik\grid\ActionColumn'],
        
    ]; 
	$model1=new \app\models\Work;		?>
	<?php     echo GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $model1,
    'columns' => $gridColumns,
	'containerOptions' => ['style'=>'overflow: auto','class'=>'small'], // only set when $responsive = false
    'headerRowOptions'=>['class'=>'kartik-sheet-style'],
    'filterRowOptions'=>['class'=>'kartik-sheet-style'],
    'pjax' => true, // pjax is set to always true for this demo
		/*
    'beforeHeader'=>[
    [
    'columns'=>[
    ['content'=>'Header Before 1', 'options'=>['colspan'=>3, 'class'=>'text-center warning']],
    ['content'=>'Header Before 2', 'options'=>['colspan'=>3, 'class'=>'text-center warning']],
    ['content'=>'Header Before 3', 'options'=>['colspan'=>4, 'class'=>'text-center warning']],
    ],
    'options'=>['class'=>'skip-export'] // remove this row from export
    ]
    ],
		*/
    // set your toolbar
    'toolbar' => [
    ['content'=>
    Html::button('<i class="glyphicon glyphicon-plus"></i>', ['type'=>'button', 'title'=>Yii::t('app', 'Add Progress'), 'class'=>'btn btn-success', 'onclick'=>'alert("This will launch the progress updation form");']) . ' '.
    Html::a('<i class="glyphicon glyphicon-repeat"></i>', ['grid-demo'], ['data-pjax'=>0, 'class' => 'btn btn-default', 'title'=>Yii::t('app', 'Reset Grid')])
    ],
    '{export}',
    '{toggleData}',
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
    'type' => GridView::TYPE_ACTIVE,
    'heading' => "List of Works",
		'resizableColumns'=>false,
    ],
    //'exportConfig' => $exportConfig,
    ]);?>
	

</div>
