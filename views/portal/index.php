<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use mirocow\yandexmaps\Map;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PortalSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $map Map */

$this->title = 'Portals';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="portal-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <? echo \mirocow\yandexmaps\Canvas::widget([
        'htmlOptions' => [
            'style' => 'height: 400px;',
        ],
        'map' => $map,
    ]); ?>

    <?php echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'lat',
            'lng',
            'title',
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
