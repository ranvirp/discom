<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\masterdata\models\DesignationTypeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Designation Types');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="designation-type-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create {modelClass}', [
    'modelClass' => 'Designation Type',
]), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
             'header'=>'Area of Posting',
			  'value'=>function($model,$key,$index,$column){
		$name ='name_'.Yii::$app->language;
			     return \app\modules\masterdata\models\Level::findOne($model->level_id)
					 ->$name;
			  }
				],
            'name_hi',
            'name_en',
            'shortcode',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
