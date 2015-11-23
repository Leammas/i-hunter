<?php
namespace app\models;

use mirocow\yandexmaps\Canvas;
use mirocow\yandexmaps\objects\Placemark;
use yii\base\Model;
use yii\data\ArrayDataProvider;
use yii\helpers\Html;

class Map extends Model
{

    /**
     * @var ArrayDataProvider Portal[]
     */
    public $portals;

    /**
     * @var \mirocow\yandexmaps\Map
     */
    protected $map;

    /**
     * @return string
     * @throws \Exception
     */
    public function getMap()
    {
        if (isset($this->portals) && $this->portals->totalCount > 0)
        {
            $this->map = $this->genMap();
            $mapHtml = Canvas::widget([
                'htmlOptions' => [
                    'style' => 'height: 400px;',
                ],
                'map' => $this->genMap(),
            ]);
        }
        else
        {
            $mapHtml = \Yii::$app->view->render('//portal/empty-result');
        }
        return $mapHtml;
    }

    /**
     * @return \mirocow\yandexmaps\Map
     */
    protected function genMap()
    {
        $center = [$this->portals->models[0]->lat, $this->portals->models[0]->lng];

        $map = new \mirocow\yandexmaps\Map('yandex_map', [
            'center' => $center,
            'zoom' => 10,
            // Enable zoom with mouse scroll
            'behaviors' => array('default', 'scrollZoom'),
            'type' => "yandex#map",
        ],
            [
                'controls' => [
                    "new ymaps.control.TypeSelector(['yandex#map', 'yandex#satellite'])",
                ],
            ]
        );

        foreach($this->portals->models as $portal)
        {
            /**
             * @var $portal Portal
             */
            $mark = new Placemark(
                [$portal->lat, $portal->lng],
                ['balloonContent' => $portal->getBalloon()],
                [
                    'iconColor' => $portal->getIconColor(),
                ]);
            $map->addObject($mark);
        }
        unset($portal, $mark);

        return $map;
    }

}
