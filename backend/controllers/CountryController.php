<?php

namespace backend\controllers;

use Yii;
use app\models\Country;
use app\models\CountrySearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\filters\AccessControl;

/**
 * CountryController implements the CRUD actions for Country model.
 */
class CountryController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'create', 'view', 'update', 'error'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
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
     * Lists all Country models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CountrySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Country model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Country model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Country();
        $model->created_at = Yii::$app->formatter->asDate('now', 'yyyy-MM-dd');
        $imgstats = false;

        if ($model->load(Yii::$app->request->post())) {
            try{
                $flag = UploadedFile::getInstance($model,'image');
                if($model->image !=''){
                    $model->image = $model->code.'.'.$flag->extension;
                }else{
                    $imgstats = true;
                }
                if($model->save()){
                    if($imgstats){
                        $flag->saveAs('uploads/'.$model->code.'.'.$flag->extension);    
                    }
                    
                    Yii::$app->getSession()->setFlash('succcess','Data Saved');
                    return $this->redirect(['view', 'id' => $model->code]);

                }else{
                    Yii::$app->getSession()->setFlash('error','Data not saved!');
                    return $this->render('create', [
                         'model' => $model,
                         ]);
                }

            }catch(Exception $e){
              Yii::$app->getSession()->setFlash('error',"{$e->getMessage()}");
          }

        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Country model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $model->updated_at = Yii::$app->formatter->asDate('now', 'yyyy-MM-dd hh:mm:ss');
        $model->scenario = 'update-photo-upload';
        $current_image = $model->image;

        if ($model->load(Yii::$app->request->post())) {
             try{
                $flag = UploadedFile::getInstance($model,'image');
                if(!empty($flag) && $flag->size !== 0){
                    if(!empty($current_image)){
                        unlink(Yii::getAlias('@backend').'/web/uploads/'.$current_image);
                    }
                    $model->image = $model->code.'.'.$flag->extension;
                    $flag->saveAs('uploads/'.$model->code.'.'.$flag->extension);
                    $model->save();
                    Yii::$app->getSession()->setFlash('succcess','Data Saved');
                    return $this->redirect(['view', 'id' => $model->code]);

                }else{
                    //Yii::$app->getSession()->setFlash('error','Data not saved!');
                    $model->image = $current_image;
                    $model->save();
                     return $this->redirect(['view', 'id' => $model->code]);
                }

            }catch(Exception $e){
              Yii::$app->getSession()->setFlash('error',"{$e->getMessage()}");
          }
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Country model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        if($model->image!=""){
            $flag = Yii::getAlias('@backend').'/web/uploads/'.$model->image;
            if(file_exists($flag)){
                unlink($flag);
            }
        }
        $model->delete();


        return $this->redirect(['index']);
    }

    /**
     * Finds the Country model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Country the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Country::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
