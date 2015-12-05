<?php
namespace app\controllers;

use app\models\Player;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;

class PlayerController extends Controller
{

    public $modelClass = 'app\models\Player';

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

    public function actionFindByAgent($agent = null, $id = null)
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $out = ['results' => ['id' => '', 'text' => '']];
        if (!is_null($agent)) {
            $data = Player::find()->byAgent($agent)->all();
            $out['results'] = array_map(
                function($item) {
                    /**
                     * @var $item Player
                     */
                    return ['id' => $item->id, 'text' => $item->agentId];
                },
                $data
            );
        }
        elseif ($id > 0) {
            $out['results'] = ['id' => $id, 'text' => Player::findOne($id)->agentId];
        }
        return $out;
    }

}
