<?php

namespace app\controllers;

use app\models\User;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\authclient\ClientInterface;
use yii\web\Response;
use yii\web\UnauthorizedHttpException;

class SiteController extends Controller
{
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

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'auth' => [
                'class' => 'yii\authclient\AuthAction',
                'successCallback' => [$this, 'oAuthSuccess'],
            ],
        ];
    }

    /**
     * This function will be triggered when user is successfuly authenticated using some oAuth client.
     *
     * @param ClientInterface $client
     * @return boolean|Response
     * @throws UnauthorizedHttpException
     */
    public function oAuthSuccess($client) {
        // get user data from client
        $userAttributes = $client->getUserAttributes();
        if (isset($userAttributes['emails']) && isset($userAttributes['emails'][0]) && isset($userAttributes['emails'][0]['value']))
        {
            $email = $userAttributes['emails'][0]['value'];
            $user = User::find()->byEmail($email)->one();
            if ($user instanceof User)
            {
                return Yii::$app->user->login($user, 3600*24*30);
            }
            else
            {
                Yii::info('Попытка входа с неразрешенного аккаунта:' . $email . var_export($userAttributes, true));
                throw new UnauthorizedHttpException('You shall not pass!');
            }
        }
        else
        {
            Yii::error('Нет данных аккаунта в ответе OAuth:' . var_export($userAttributes, true));
            throw new UnauthorizedHttpException('OAuth service error');
        }
    }

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        return $this->render('login');
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

}
