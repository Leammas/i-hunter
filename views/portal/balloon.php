<?php
use yii\helpers\Html;

/**
 * @var $portal \app\models\Portal;
 */
?>

<div><?= Html::encode($portal->title) ?></div>
<div><?= Html::a('Intel link', $portal->intelLink, ['target' => 'blank'])?></div>
<div>Стоит уже <?= $portal->getTimePassed() ?> дней</div>
<div>Владелец: <?= Html::a(Html::encode($portal->currOwner->agentId), ['portal/index', 'PortalSearch[currOwner]' => $portal->currOwner->agentId])?></div>
<?= Html::img($portal->image) ?>