<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Consultas */

$this->title = 'Consulta';

?>
<div class="consultas-create">
      <?= $this->render('_form', [
        'model' => $model,
           ]) ?>
</div>
