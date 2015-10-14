<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Portal */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Portals', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="portal-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= Html::img($model->image); ?>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'guid',
            'lat',
            'lng',
            'title',
            'approved',
            'curr_owner:ntext',
            'level',
            'resCount',
            'dateCapture',
            'timeUpdated',
            'mode1owner:ntext',
            'mode1name',
            'mode1rarity',
            'mode2owner:ntext',
            'mode2name',
            'mode2rarity',
            'mode3owner:ntext',
            'mode3name',
            'mode3rarity',
            'mode4owner:ntext',
            'mode4name',
            'mode4rarity',
            'res1owner:ntext',
            'res1energy',
            'res1level',
            'res2owner:ntext',
            'res2energy',
            'res2level',
            'res3owner:ntext',
            'res3energy',
            'res3level',
            'res4owner:ntext',
            'res4energy',
            'res4level',
            'res5owner:ntext',
            'res5energy',
            'res5level',
            'res6owner:ntext',
            'res6energy',
            'res6level',
            'res7owner:ntext',
            'res7energy',
            'res7level',
            'res8owner:ntext',
            'res8energy',
            'res8level',
        ],
    ]) ?>

</div>
