<?php

namespace app\controllers;

use Yii;
use app\models\Reply;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ReplyController implements the CRUD actions for Reply model.
 */
class ReplyController extends Controller
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
     * Lists all Reply models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Reply::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Reply model.
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
     * Creates a new Reply model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($ct,$ctid)
    {
		if (Yii::$app->user->isGuest)
			$this->redirect(['user/login']);
		$contentmodel=null;
		try {
			$ctclass=\app\models\Reply::$classmap[$ct];
		    $contentmodel=$ctclass::findOne($ctid);
		} catch(Exception $e)
		{
			throw new HttpException(400,'Invalid request');
		}
		if ($contentmodel!=null)
		{
			$name='name_'.Yii::$app->language;
		$parentcontent=$ct.$ctid.":".$contentmodel->$name;
        $model = new Reply();
		$model->content_type=$ct;
		$model->content_type_id=$ctid;
		$model->author_id=Yii::$app->user->id;
		$model->create_time=time();
       if ($model->load(Yii::$app->request->post()) && $model->validate()) {
		   
			if (count(Yii::$app->request->post("Reply_attachments"))>0)
			$model->attachments=implode(",",Yii::$app->request->post("Reply_attachments"));
		    else
				$model->attachments='';
			$model->save();
       	if ($model->attachments!='')
			{
				$fileids = explode(",",$model->attachments);
				foreach ($fileids as $fileid)
				{
					$file = \app\models\File::findOne($fileid);
					if ($file)
					{
						$file->model_type='\app\models\Reply';
						$file->model_pk = $model->id;
						$file->save();
					}
				}
			}
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
				'parentcontent'=>$parentcontent
            ]);
        }
		}
    }

    /**
     * Updates an existing Reply model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $model->update_time=time();
       if ($model->load(Yii::$app->request->post()) && $model->validate()) {
		   
			if (count(Yii::$app->request->post("Reply_attachments"))>0)
			$model->attachments=implode(",",Yii::$app->request->post("Reply_attachments"));
		$model->save();
       	if ($model->attachments!='')
			{
				$fileids = explode(",",$model->attachments);
				foreach ($fileids as $fileid)
				{
					$file = \app\models\File::findOne($fileid);
					if ($file)
					{
						$file->model_type='\app\models\Reply';
						$file->model_pk = $model->id;
						$file->save();
					}
				}
			}
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
        
    }

    /**
     * Deletes an existing Reply model.
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
     * Finds the Reply model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Reply the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Reply::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
