<?php

namespace app\controllers;

use Yii;
use app\models\Work;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * WorkController implements the CRUD actions for Work model.
 */
class WorkController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Work models.
     * @return mixed
     */
    public function actionIndex()
    {
        $model=new \app\models\WorkSearch;
		/*
		$dataProvider = new ActiveDataProvider([
            'query' => $model->search(Yii::$app->request->get()),
        ]);
		 * 
		 */
		
		$dataProvider=$model->search(Yii::$app->request->get());
		$model=new \app\models\WorkProgress;
		if ($model->load(Yii::$app->request->post())&& $model->save())
		{
			//Yii::$app->user->setFlash('Work Progress Updated Successfully');
		}

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Work model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Work model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate1()
    {
        $model = new Work();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
			$mr=new \app\models\MaterialRequirement;
			$mts=Yii::$app->request->post('MaterialRequirement["material_type"]');
			$qts=Yii::$app->request->post('MaterialRequirement["qty"]');
			$values=Yii::$app->request->post('MaterialRequirement["value"]');
			print_r($mts);
			exit;
			for ($i=0;$i<count($mts);$i++)
			{
				unset($mr->id);
				$mr->material_type=$mts[$i];
				$mr->qty=$qts[$i];
				$mr->value=$values[$i];
				print_r($mr);
				exit;
				$mr->save();
			}
			
			
			
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Work model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
			
			$mrs=Yii::$app->request->post('MaterialRequirement');
			
			//print_r($mrs);
			//exit;
			for ($i=0;$i<count($mrs);$i++)
			{
				$mr=new \app\models\MaterialRequirement;
				$mr->work_id=$model->id;
				if (isset($mrs['id']))
				$mr->id=$mrs['id'][$i];
				$mr->material_type=$mrs['material_type'][$i];
				$mr->qty=$mrs['qty'][$i];
				$mr->value=$mrs['qty'][$i];
				//print_r($mr);
				if (!$mr->save())
					print_r ($mr->errors);
				//exit;
			}
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Work model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Work model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Work the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Work::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
	public function actionDashboard()
	{
		return $this->render('dashboard');
	}
	public function actionCreate()
	{
		/*
		 * 3 | 33/11 KV  S/S : New
  4 | 33/11 KV  S/S : Additional Transformer
  5 | 33/11 KV  S/S : Transformer capacity enhancement
  6 | Renovation & Modernisation of 33/11 kV SS
  7 | New 33 KV new feeders/Bifurcation of feeders:
  8 | 33 KV feeders Reconductoring/Augmentation
  9 | 33 kV Line Bay Extension at EHV station
 10 | 11 kV Line : New Feeder/ Feeder Bifurcation
 11 | 11 kV Line : Augmentation/Reconductoring
 12 | Arial Bunched Cable
 13 | UG Cable
 14 | 11 KV Bay Extension
 15 | Installation of Distribution Transformer
 16 | Capacity enhancement of LT sub-station
 17 | LT Line : New Feeder/ Feeder Bifurcation
 18 | LT Line : Augmentation/Reconductoring
 19 | Capacitor Bank
 20 | HVDS
 21 | Metering
 22 | Provisioning of solar panel
 23 | RMU,Sectionaliser, Auto reclosures, FPI etc.
 24 | Others

		 */
		$x=\app\models\Work::$work_type_rules;
	
		$model = new Work();
 
        if ($model->load(Yii::$app->request->post()))
        {
			if (array_key_exists($model->work_type_id,$x))
			$model->validators->append(
               \yii\validators\Validator::createValidator('required', $model, $x[$model->work_type_id]['required'])
            );
			if ($model->save())
            $model = new Work(); //reset model
        }
 
        $searchModel = new \app\models\WorkSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
 
        return $this->render('index_3', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'model' => $model,
			'x'=>$x
        ]);

	}
	public function actionAddmat()
	{
		if (!Yii::$app->user->can('operator'))
			throw new \yii\web\HttpException('403','The requested page is not for you. Ask operator.');
		$model=new \app\models\WorkSearch;
		
		$dataProvider=$model->search(Yii::$app->request->get());
	
		return $this->render('index_2',['dataProvider' => $dataProvider]);
	}
	public function actionForm1()
	{
		$x=[1=>['show'=>['name_en','feeder_id'],'required'=>['feeder_id']]];
		$work=Yii::$app->request->post('Work');
		if (array_key_exists('work_type_id',$work))
		{
			$work_type_id=$work['work_type_id'];
			foreach ($x[$work_type_id]['show'] as $field)
			{
				$content.=\app\models\Work::display($form,$field);
			}
		}
	}
}
