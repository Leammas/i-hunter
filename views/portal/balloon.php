<?php
use yii\helpers\Html;

/**
 * @var $portal \app\models\Portal;
 */
?>

<div><?= Html::encode($portal->title) ?></div>
<div>Стоит уже <?= $portal->getTimePassed() ?> дней</div>
<div>Владелец: <?= Html::encode($portal->currOwner->agentId)?></div>
<?= Html::img($portal->image) ?>