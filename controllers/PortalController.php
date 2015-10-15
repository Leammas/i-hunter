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
        Yii::info("Пользователь на странице поиска порталов " . Yii::$app->user->identity->email, 'site');
        $searchModel = new PortalSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        $center = [$dataProvider->getModels()[0]->lat, $dataProvider->getModels()[0]->lng];

        $map = new Map('yandex_map', [
            'center' => $center,
            'zoom' => 10,
            // Enable zoom with mouse scroll
            'behaviors' => array('default', 'scrollZoom'),
            'type' => "yandex#map",
        ],
            [
                // Permit zoom only fro 9 to 11
                'controls' => [
                    "new ymaps.control.SmallZoomControl()",
                    "new ymaps.control.TypeSelector(['yandex#map', 'yandex#satellite'])",
                ],
            ]
        );

        foreach($dataProvider->getModels() as $portal)
        {
            /**
             * @var $portal Portal
             */
            $mark = new Placemark([$portal->lat, $portal->lng], ['iconContent' => $portal->title, 'balloonContent' => Html::img($portal->image)], ['preset' => 'islands#blueStretchyIcon']);
            $map->addObject($mark);
        }
        unset($portal, $mark);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'map' => $map
        ]);
    }

    /**
     * Displays a single Portal model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {
        Yii::info("Просмотр портала {$id} пользователем " . Yii::$app->user->identity->email, 'site');
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
