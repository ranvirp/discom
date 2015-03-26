<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SubstationSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Substations');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="substation-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create {modelClass}', [
    'modelClass' => 'Substation',
]), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

           // 'circle_id',
		   ['header'=>'Circle','value'=>'circle.name_en',
			   'attribute'=>'circle_id',
            'filter'=>\yii\helpers\ArrayHelper::map(\app\models\Circle::find()->asArray()->all(),'id','name_en')	
			   ],
           // 'name_hi',
            'name_en',
            //'type',
            // 'documents:ntext',
            // 'division_id',
            // 'je_area_id',
             'voltageratio',
             'mva',
             'notrf',
             'capacity',
             'mvamax',
             'mvarmax',
             'remarks:ntext',
            

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
