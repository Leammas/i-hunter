<?php

namespace app\controllers;

use mirocow\yandexmaps\Map;
use mirocow\yandexmaps\objects\Placemark;
use Yii;
use app\models\Portal;
use app\models\PortalSearch;
use yii\filters\AccessControl;
use yii\helpers\Html;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use app\models\Map as MapModel;

/**
 * PortalController implements the CRUD actions for Portal model.
 */
class PortalController extends Controller
{

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ]
        ];
    }

    /**
     * Lists all Portal models.
     * @return mixed
     */
    public function actionIndex()
    {
        Yii::info("Пользователь на странице поиска порталов " . Yii::$app->user->identity->email, 'user');
        $searchModel = new PortalSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $map = new MapModel(['portals' => $dataProvider]);
        $searchModel->reinitEmptyArrays();
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'map' => $map
        ]);
    }

    /**
     * Search form
     * @return mixed
     */
    public function actionKml()
    {
        Yii::info("Пользователь загрузил kml " . Yii::$app->user->identity->email, 'user');
        $headers = Yii::$app->response->headers;
        $headers->add('Content-Type', 'application/xml');
        $headers->add('Content-Disposition', 'attachment; filename=portals.kml');
        $searchModel = new PortalSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $searchModel->reinitEmptyArrays();
        $body = $this->renderPartial('indexkml', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
        Yii::$app->response->content = $body;
        Yii::$app->response->format = \yii\web\Response::FORMAT_RAW;
        return;
    }

    /**
     * Displays a single Portal model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {
        Yii::info("Просмотр портала {$id} пользователем " . Yii::$app->user->identity->email, 'user');
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Finds the Portal model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Portal the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Portal::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
