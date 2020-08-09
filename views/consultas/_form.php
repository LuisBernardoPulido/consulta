<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
$this->registerJsFile(Yii::$app->request->baseUrl . '/js/control_consultas.js', ['depends' => [\yii\web\JqueryAsset::className()]]);

/* @var $this yii\web\View */
/* @var $model app\models\Consultas */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="panel panel-primary" id="panel-primary-mpc">
    <div class="panel-heading" id="panel-heading-mpc">Datos de consulta</div>
    <div class="panel-body">
        <?php $form = ActiveForm::begin(); ?>
        <div class="consultas-form">

            <div class="row">
                <div class="col-md-4">
                    <?= $form->field($model, 'p10_tipo')->dropDownList(['0' => 'Tuberculosis','1' => 'Brucelosis']) ?>
                </div>
                <div class="col-md-4">
                    <?= $form->field($model, 'p10_valor')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-md-2">
                    <div id="icon">
                        <br>
                        <i id="yes" class="fa fa-check" aria-hidden="true" style="color: green; font-size: 25px; display: none;"></i>
                        <i id="no" class="fa fa-close" aria-hidden="true" style="color: red; font-size: 25px; display: none;"></i>
                    </div>
                </div>
                <div class="col-md-2">
                    <label class="control-label" for="botonOk">&nbsp;</label>
                    <button type="button" id="botonOkPorArete" onclick="buscar()" class="btn btn-info btn-flat col-xs-12" style="color: white; border-color: #942626; background-color: #942626";">Buscar</button>
                </div>
            </div>

            <div id="resultados" style="display: none;">
                <div class="panel panel-primary" id="panel-primary-mpc">
                    <div class="panel-heading" id="panel-heading-mpc">Resultados</div>
                    <div class="panel-body">

                        <input class="form-control"  id="id" style="display: none;">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="tipo">Tipo de prueba</label>
                                <input class="form-control"  id="tipo" readonly>
                            </div>
                            <div class="col-md-4">
                                <label for="unidad">UPP/PSG</label>
                                <input class="form-control"  id="unidad" readonly>
                            </div>
                            <div class="col-md-4">
                                <label for="cabezas">No. de cabezas</label>
                                <input class="form-control"  id="cabezas" readonly>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="box box-solid">
                                    <div class="box-header with-border">
                                           <h3 class="box-title">Consulta por arete</h3>
                                    </div>
                                    <!-- /.box-header -->
                                    <div class="box-body">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <label for="arete">Arete</label>
                                                <input class="form-control"  id="arete" >
                                            </div>
                                            <div class="col-md-2">
                                                <label class="control-label" for="consu">&nbsp;</label>
                                                <button type="button" id="consu" onclick="buscararete()" class="btn btn-info btn-flat col-xs-12" style="color: white; border-color: #942626; background-color: #942626";">Buscar</button>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="tipo">Resultado</label>
                                                <input class="form-control"  id="res" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.box-body -->
                                </div>
                            </div>


                        </div>

                    </div>
                </div>
            </div>


    <?php ActiveForm::end(); ?>

</div>
</div>
</div>
