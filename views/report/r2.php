<?php
use yii\data\ActiveDataProvider;
//http://www.yiiframework.com/wiki/679/filter-sort-by-summary-data-in-gridview-yii-2-0/

 use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SchemeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = "List of Works for ".$scheme->name_en ;
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="work-index small">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Work', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php 
	$gridColumns = [
            ['class' => '\yii\grid\SerialColumn'],

            ['header'=>'Division',
				'attribute'=>'division_id',
				'filter'=>\yii\helpers\ArrayHelper::map(\app\models\Division::find()->asArray()->all(),'id','name_en'),
			  'value'=>function($model,$key,$index,$column)
	                    {
		                   $div= \app\models\Division::findOne($model->division_id);
						   return $div?$div->name_en:'Not found';
		    
			            }
		],
            'name_'.Yii::$app->language.':ntext',
		 ['header'=>'Work Type','value'=>function($model,$key,$index,$column){
		$name='name_'.Yii::$app->language;
		return $model->workType?$model->workType->$name:'';}],
			'address',
            ['header'=>'Agency','value'=>function($model,$key,$index,$column)
	{ $name='name_'.Yii::$app->language;return $model->agency0?$model->agency0->$name:'';},],
           
			
			'totvalue',
			'dateofsanction',
            
						
           

            ['class' => 'yii\grid\ActionColumn'],
        
    ]; 
	$searchModel=new \app\models\WorkSearch;
    echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => $gridColumns,
		'tableOptions'=>['class'=>'table table-responsive table-striped small'],
    ]); ?>

</div>



