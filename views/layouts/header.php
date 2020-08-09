<?php
use yii\helpers\Html;
use yii\helpers\Url;

$this->registerJsFile(Yii::$app->request->baseUrl.'/sweetalert2/sweetalert2.min.js', ['depends'=>[\yii\web\JqueryAsset::className()]]);
$this->registerCssFile(Yii::$app->request->baseUrl.'/sweetalert2/sweetalert2.css');
$this->registerJsFile(Yii::$app->request->baseUrl.'/bootstrap-select-1.12.2/bootstrap-select.js', ['depends'=>[\yii\web\JqueryAsset::className()]]);
$this->registerJsFile(Yii::$app->request->baseUrl.'/bootstrap-select-1.12.2/bootstrap-select.js', ['depends'=>[\yii\web\JqueryAsset::className()]]);
$this->registerJsFile('/vendor/igorescobar/jquery-mask-plugin/src/jquery.mask.js', ['depends'=>[\yii\web\JqueryAsset::className()]]);
$this->registerJsFile(Yii::$app->request->baseUrl . '/js/control_main.js', ['depends' => [\yii\web\JqueryAsset::className()]]);

//$this->registerJsFile('/SIFOPE/kartik-v/yii2-widget-select2/assets/js/select2.full.js', ['depends'=>[\yii\web\JqueryAsset::className()]]);
//$values = $headers->remove('X-Frame-Options');
/* @var $this \yii\web\View */
/* @var $content string */

?>
<header class="main-header" style="position: fixed;width: 100%;" xmlns="http://www.w3.org/1999/html">
    <nav class="navbar navbar-static-top">
        <div class="container">
            <div class="navbar-header">
                <a href="#" class="navbar-brand"><b>Consulta de Dictámenes</b></a>
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
                    <i class="fa fa-bars"></i>
                </button>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="../web/index.php">Inicio <span class="sr-only">(current)</span></a></li>

                    <li><a href="../web/index.php?r=consultas/create">Consulta</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Opciones <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="../web/index.php?r=consultas/create">Generar reporte</a></li>
                            <li><a href="#">Consulta</a></li>
                            <li class="divider"></li>
                            <li><a href="#">Mi historial</a></li>
                            <li class="divider"></li>
                            <li><a href="#">Contacto</a></li>
                        </ul>
                    </li>
                </ul>

            </div>
            <!-- /.navbar-collapse -->
            <!-- Navbar Right Menu -->
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <!-- Messages: style can be found in dropdown.less-->
                    <li class="dropdown messages-menu">
                        <!-- Menu toggle button -->
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-envelope-o"></i>
                            <span class="label label-success">4</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">Tienes 4 mensajes</li>
                            <li>
                                <!-- inner menu: contains the messages -->
                                <ul class="menu">
                                    <li><!-- start message -->
                                        <a href="#">
                                            <div class="pull-left">
                                                <!-- User Image -->

                                            </div>
                                            <!-- Message title and timestamp -->
                                            <h4>
                                                Información
                                                <small><i class="fa fa-clock-o"></i> 5 mins</small>
                                            </h4>

                                            <p>Recuerda que puedes consultar ...</p>
                                        </a>
                                    </li>

                                </ul>

                            </li>
                            <li class="footer"><a href="#">Ver todos los mensajes</a></li>
                        </ul>
                    </li>
                    <li class="dropdown user user-menu">
                            <li><a href="#">Salir</a></li>

                    </li>
                </ul>
            </div>
            <!-- /.navbar-custom-menu -->
        </div>
        <!-- /.container-fluid -->
    </nav>
</header>