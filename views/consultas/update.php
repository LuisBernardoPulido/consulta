<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Consultas */

$this->title = 'Update Consultas: ' . $model->p10_id;
$this->params['breadcrumbs'][] = ['label' => 'Consultas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->p10_id, 'url' => ['view', 'id' => $model->p10_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="consultas-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
