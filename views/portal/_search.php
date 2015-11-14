<?php

use kartik\widgets\Select2;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\JsExpression;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PortalSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="portal-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'title') ?>

    <?
    echo $form->field($model, 'currOwnerId')->widget(Select2::classname(), [
        'options' => ['placeholder' => 'Search for a smurf with portal...'],
        'pluginOptions' => [
            'allowClear' => true,
            'minimumInputLength' => 3,
            'ajax' => [
                'url' => Url::to(['player/find-by-agent']),
                'dataType' => 'json',
                'data' => new JsExpression('function(params) { return {agent:params.term}; }')
            ],
            'escapeMarkup' => new JsExpression('function (markup) { return markup; }'),
            'templateResult' => new JsExpression('function(player) { return player.text; }'),
            'templateSelection' => new JsExpression('function (player) { return player.text; }'),
        ],
    ]);
    ?>

    <?
    echo $form->field($model, 'involved')->widget(Select2::classname(), [
        'options' => ['placeholder' => 'Search for an involved smurf ...'],
        'pluginOptions' => [
            'allowClear' => true,
            'minimumInputLength' => 3,
            'ajax' => [
                'url' => Url::to(['player/find-by-agent']),
                'dataType' => 'json',
                'data' => new JsExpression('function(params) { return {agent:params.term}; }')
            ],
            'escapeMarkup' => new JsExpression('function (markup) { return markup; }'),
            'templateResult' => new JsExpression('function(player) { return player.text; }'),
            'templateSelection' => new JsExpression('function (player) { return player.text; }'),
        ],
    ]);
    ?>

    <div>Возможен ввод интервала через дефис, например "50-90"</div>
    <?= $form->field($model, 'timePassed') ?>


    <?= $form->field($model, 'point1') ?>

    <?= $form->field($model, 'point2') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
        <?= Html::button('GeoPreset', ['class' => 'btn btn-default portal-grid-geo']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
