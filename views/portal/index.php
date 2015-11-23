<?php

use app\models\Map;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PortalSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $map Map */

$this->title = 'Portals';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="portal-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <h3>Щелкните на карте чтобы отметить вершины прямоугольника для фильтрации по координатам</h3>

    <div>Цвета меток соответствуют времени с захвата портала от желтого к черному через красный (0-90-150)</div>
    <? echo $map->getMap(); ?>


    <?php echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'class' => 'yii\grid\Column',
                'header' => 'Ссылка на IntelMap',
                'content' => function($model) {
                    return Html::a('Link', $model->intelLink, ['target' => 'blank']);
                }
            ],
            'coord',
            'title',
            'timePassed',
            'formattedDateCapture',
            [
                'label' => 'Владелец',
                'attribute' => 'currOwner',
                'value' => 'currOwner.agentId'
            ],
            [
                'class' => 'yii\grid\Column',
                'header' => 'View',
                'content' => function($model, $key, $index, $column) {
                    $options = [
                        'title' => Yii::t('yii', 'View'),
                        'aria-label' => Yii::t('yii', 'View'),
                        'data-pjax' => '0',
                    ];
                    return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', Url::toRoute(['portal/view', 'id' => (string) $key]), $options);
                }
            ],
        ],
    ]); ?>

</div>
