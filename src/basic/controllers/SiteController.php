<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\manager;
use yii\data\ActiveDataProvider;
use yii\web\UploadedFile;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        
     /*   $manager = manager::find()->all();
        return $this->render('home1', ['manager' => $manager]);*/
    }

    public function actionHome1(){
        
        $dataProvider = new ActiveDataProvider([

            'query' => manager::find(),
            'pagination' => [
                'pageSize' => 5,
            ],
        ]);

        return $this->render('home1', ['dataProvider' => $dataProvider]);
    }

    public function actionView($id){

        $model = manager::findOne($id);
        return $this->render('view',['model' => $model]);
    }

    public function actionUpdate($id){

        $model = manager::findOne($id);

        if($model->load(Yii::$app->request->post())){
            $model->imageFile = UploadedFile::getInstance($model, 'imageFile');
            $model->upload();
            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        }
        return $this->render('edit',['model' => $model]);
    }

    public function actionAdd(){

        $model = new manager();

        if($model->load(Yii::$app->request->post())){

            $model->imageFile = UploadedFile::getInstance($model, 'imageFile');
            $model->upload();
            $model->save();
            return $this->redirect(['view','id' => $model->id]);
        }
        return $this->render('add',['model' => $model]);
    }


    
}
