<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Datuser;



class SiteController extends Controller
{
    /**
     * @inheritdoc
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
     * @inheritdoc
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
        return $this->render('index');
    }
	
	public function actionRegistrasi()
    {
		$model = new Datuser();
        if ($model->load(Yii::$app->request->post())) {
			$model->USERPWD = sha1(Yii::$app->request->post('Datuser')['USERPWD']);
			if(!$model->save()){
				Yii::$app->getSession()->setFlash('danger', [
					 'type' => 'danger',
					 'duration' => 5000,
					 'icon' => 'fa fa-users',
					 'message' => 'Registration Failed',
					 'title' => " :: Notification :: ",
					 'positonY' => 'top',
					 'positonX' => 'left'
				 ]);
			}
			else{
				Yii::$app->getSession()->setFlash('success', [
					 'type' => 'success',
					 'duration' => 5000,
					 'icon' => 'fa fa-users',
					 'message' => 'Registration Success',
					 'title' => ' :: Notification :: ',
					 'positonY' => 'top',
					 'positonX' => 'left'
				 ]);
			}
            return $this->redirect(['registrasi', 'id' => $model->USERID]);
        } else {
            return $this->render('registrasi', [
                'model' => $model,
            ]);
        }
    }
	
	public function actionFlight()
	{		
		return $this->render('flight',[
			'from' => $_GET['from'],
			'to_place' => $_GET['to_place'],
			'check_in' => str_replace( '/' , '-', $_GET['check_in']),
			'class' => $_GET['class'],
		]);
	} 

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }
}
