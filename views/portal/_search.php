<?php

use yii\helpers\Html;
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

    <?= $form->field($model, 'currOwner') ?>

    <?= $form->field($model, 'involved') ?>

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
