<?php

namespace app\controllers;

use Yii;
use app\models\File;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * FileController implements the CRUD actions for File model.
 */
class FileController extends Controller
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
     * Lists all File models.
     * @return mixed
     */
    public function actionIndex($id)
    {
        $model = File::findOne($id);
		$fullPath=Yii::getAlias('@app').'/../'.$model->path;
		//echo $fullPath;
		
     if (file_exists($fullPath)) {
        $mime=\yii\helpers\FileHelper::getMimeType($fullPath);
         //header("Pragma: no-cache");
        // header("Expires: 0");
         header('Content-Description: File Transfer');
        // header('Content-Type: ' . CFileHelper::getMimeType($model->fileWithPath()));
         header('Content-Type: ' .$mime );
        // header('Content-Disposition: attachment; filename="'.$fullPath.'"');
		 header('Content-Transfer-Encoding:binary');
		 header('Content-Length:'.$model->size);
		 readFile($fullPath);
		 exit;
		 
    }
	else 
		echo $fullPath." does not exist";
	}
    /**
     * Displays a single File model.
     * @param integer $id
     * @return mixed
     */
    public function action1View($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new File model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function action1Create()
    {
        $model = new File();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing File model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function action1Update($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing File model.
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
     * Finds the File model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return File the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = File::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
	/*
	 * File Upload Handler
	 */
	public function actionUpload()
	{
		        if (Yii::$app->request->isPost) {
					$uploads=[];
					$fileModel=new \app\models\File;
					//print_r(Yii::$app->request->post());
					//exit;
					$model=Yii::$app->request->post('model');
					$attribute=Yii::$app->request->post('attribute');
					$title=Yii::$app->request->post('title');
					$file_id=Yii::$app->request->post('file_id');
					//exit;
					
					$model = new $model;
            $files = \yii\web\UploadedFile::getInstances($model,$attribute);

            if ($files) {  
				foreach ($files as $index=>$file)
                $file->saveAs('../uploads/' . $file->baseName . '.' . $file->extension);
				$fileModel->filename=$file->name;
				$fileModel->size=$file->size;
				$fileModel->path=Yii::getAlias("@web").'/../uploads/'.$file->name;
				if ($title[$file_id]!='')
				$fileModel->title=$title[$file_id];
				else
					 $fileModel->title=$file->name;
				$fileModel->mime=\yii\helpers\FileHelper::getMimeType($file->tempName);
				$fileModel->save();
			    $fileModel->url=\yii\helpers\Url::to(['/file?id='.$fileModel->id]);
				$fileModel->uploaded_by = Yii::$app->user->getId();
				$fileModel->uploaded_at =time();
				$fileModel->save();
			
				$uploads[]=$fileModel->id;
            }
        }
		return json_encode($uploads);
	}
}
