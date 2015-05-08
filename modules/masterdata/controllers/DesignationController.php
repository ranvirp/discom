<?php

namespace app\modules\masterdata\controllers;

use Yii;
use app\common\Utility;
use app\modules\masterdata\models\Designation;
use app\modules\masterdata\models\DesignationSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * DesignationController implements the CRUD actions for Designation model.
 */
class DesignationController extends Controller
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
     * Lists all Designation models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new DesignationSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'model'=>null,
        ]);
    }

    /**
     * Displays a single Designation model.
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
     * Creates a new Designation model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    
    public function actionCreate()
    {
       
       
        $model = new Designation();
 
        if ($model->load(Yii::$app->request->post()))
        {
           if (array_key_exists('app\modules\masterdata\models\Designation',Utility::rules()))
            foreach ($model->attributes as $attribute)
            if (Utility::rules('Designation') && array_key_exists($attribute,Utility::rules()['app\modules\masterdata\models\Designation']))
            $model->validators->append(
               \yii\validators\Validator::createValidator('required', $model, Utility::rules()['app\modules\masterdata\models\Designation'][$model->$attribute]['required'])
            );
            if ($model->save())
            {
            $model->createUserAndRole();
             $model = new Designation();; //reset model
           
      
            }
        }
 
        $searchModel = new DesignationSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
 
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'model' => $model,
            
        ]);

    }

    /**
     * Updates an existing Designation model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
        public function actionUpdate($id)
    {
         $model = $this->findModel($id);
        $x=\app\modules\masterdata\models\Designation::find()->where(['level_id'=>$model->level_id,
		'designation_type_id'=>$model->designation_type_id])->one();
    	if ($x) $model->id=$x->id;
        if ($model->load(Yii::$app->request->post()))
        {
        if (array_key_exists('app\modules\masterdata\models\Designation',Utility::rules()))
           
            foreach ($model->attributes as $attribute)
            if (array_key_exists($attribute,Utility::rules()['app\modules\masterdata\models\Designation']))
            $model->validators->append(
               \yii\validators\Validator::createValidator('required', $model, Utility::rules()['app\modules\masterdata\models\Designation'][$model->$attribute]['required'])
            );
            if ($model->save())
            {
             $model->createUserAndRole();
      
            $model = new Designation();; //reset model
            
            }
        }
 
       $searchModel = new DesignationSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
 
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'model' => $model,
            
        ]);

    }
    /**
     * Deletes an existing Designation model.
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
     * Finds the Designation model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Designation the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Designation::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
}
