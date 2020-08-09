<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\search\ConsultasSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="consultas-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'p10_id') ?>

    <?= $form->field($model, 'p10_tipo') ?>

    <?= $form->field($model, 'p10_valor') ?>

    <?= $form->field($model, 'p10_usuAlta') ?>

    <?= $form->field($model, 'p10_fecAlta') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
