<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Turno;
use app\models\Usuario;

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

    /**
     * Login action.
     *
     * @return string
     */
    public function actionIniciarTurno()
    {
        if (!Yii::$app->user->isGuest)
        {
            return $this->goHome();
        }

        $turno = new Turno();
        $login = new LoginForm();

        $post = Yii::$app->request->post();
        if ($login->load($post))
        {
            $isLoginValid = $login->validate();

            if($isLoginValid) {
                $turno->UsuarioID = $login->Usuario->ID;
                $isTurnoSaved = $turno->save();
                if(!$isTurnoSaved) {
                    Yii::$app->session->setFlash('danger', 'No se ha podido iniciar el turno');
                    Yii::error("Errores: \n"
                                . 'Turno: ' . \yii\helpers\VarDumper::dumpAsString($turno->errors) . "\n"
                                . 'LoginForm: ' . \yii\helpers\VarDumper::dumpAsString($login->errors));
                }

                $isLogged = ($isTurnoSaved and $login->login());
            }

            if(isset($isLogged) and $isLogged === true) {
                Yii::$app->session->setFlash('success', 'Turno Iniciado');
                return $this->goHome();
            }
        }

        return $this->render('iniciar-turno', [
            'turno' => $turno,
            'login' => $login,
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
