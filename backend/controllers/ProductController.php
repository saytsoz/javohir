<?php

namespace backend\controllers;

use Yii;
use common\models\product;
use common\models\ProductSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * ProductController implements the CRUD actions for product model.
 */
class ProductController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'ghost-access'=>[
                'class' =>'webvimark\modules\UserManagement\components\GhostAccessControl',
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all product models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ProductSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single product model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new product model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new product();

        if ($model->load(Yii::$app->request->post()) ) {
            if(isset($_FILES['Product']['name']['image1']) && $_FILES['Product']['name']['image1']){
                $path = Yii::getAlias("@frontend/web/uploads/pages/");
               // BaseFileHelper::createDirectory($path);
                $file = UploadedFile::getInstance($model,'image1');
                $name = time().'rasm_bir'.'.'.$file->extension;
                $file->saveAs($path .DIRECTORY_SEPARATOR .$name);
                $model->image1 = $name;
            }
        
            if(isset($_FILES['Product']['name']['image2']) && $_FILES['Product']['name']['image2']){
                $path = Yii::getAlias("@frontend/web/uploads/pages/");
               // BaseFileHelper::createDirectory($path);
                $file = UploadedFile::getInstance($model,'image2');
                $name = time().'rasm_bir'.'.'.$file->extension;
                $file->saveAs($path .DIRECTORY_SEPARATOR .$name);
                $model->image2 = $name;
            }    
        if(isset($_FILES['Product']['name']['image3']) && $_FILES['Product']['name']['image3']){
                $path = Yii::getAlias("@frontend/web/uploads/pages/");
               // BaseFileHelper::createDirectory($path);
                $file = UploadedFile::getInstance($model,'image3');
                $name = time().'rasm_bir'.'.'.$file->extension;
                $file->saveAs($path .DIRECTORY_SEPARATOR .$name);
                $model->image3 = $name;
            }  
        if(isset($_FILES['Product']['name']['image4']) && $_FILES['Product']['name']['image4']){
                $path = Yii::getAlias("@frontend/web/uploads/pages/");
               // BaseFileHelper::createDirectory($path);
                $file = UploadedFile::getInstance($model,'image4');
                $name = time().'rasm_bir'.'.'.$file->extension;
                $file->saveAs($path .DIRECTORY_SEPARATOR .$name);
                $model->image4 = $name;
            }      
            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing product model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) ) {
            if(isset($_FILES['Product']['name']['image1']) && $_FILES['Product']['name']['image1']){
                $path = Yii::getAlias("@frontend/web/uploads/pages/");
               // BaseFileHelper::createDirectory($path);
                $file = UploadedFile::getInstance($model,'image1');
                $name = time().'rasm_bir'.'.'.$file->extension;
                $file->saveAs($path .DIRECTORY_SEPARATOR .$name);
                $model->image1 = $name;
            }
        if(isset($_FILES['Product']['name']['image2']) && $_FILES['Product']['name']['image2']){
                $path = Yii::getAlias("@frontend/web/uploads/pages/");
               // BaseFileHelper::createDirectory($path);
                $file = UploadedFile::getInstance($model,'image2');
                $name = time().'rasm_bir'.'.'.$file->extension;
                $file->saveAs($path .DIRECTORY_SEPARATOR .$name);
                $model->image2 = $name;
            }    
        if(isset($_FILES['Product']['name']['image3']) && $_FILES['Product']['name']['image3']){
                $path = Yii::getAlias("@frontend/web/uploads/pages/");
               // BaseFileHelper::createDirectory($path);
                $file = UploadedFile::getInstance($model,'image3');
                $name = time().'rasm_bir'.'.'.$file->extension;
                $file->saveAs($path .DIRECTORY_SEPARATOR .$name);
                $model->image3 = $name;
            }  
        if(isset($_FILES['Product']['name']['image4']) && $_FILES['Product']['name']['image4']){
                $path = Yii::getAlias("@frontend/web/uploads/pages/");
               // BaseFileHelper::createDirectory($path);
                $file = UploadedFile::getInstance($model,'image4');
                $name = time().'rasm_bir'.'.'.$file->extension;
                $file->saveAs($path .DIRECTORY_SEPARATOR .$name);
                $model->image4 = $name;
            }       
            
            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing product model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    public function actionDeletePhoto($id,$imagebg){
        $model = $this -> findModel($id);
        $image = Yii:: getAlias('@frontend/web/uploads/pages/'). $model->$imagebg;

            if(file_exists($image)){
                unlink($image);
                $model->$imagebg = null;
            }else{
                $model->$imagebg = null;
            }

            $model->save(false);

            $this->redirect(['update','id'=>$model->id]);
    }

    /**
     * Finds the product model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return product the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = product::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
