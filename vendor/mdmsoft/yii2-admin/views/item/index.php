<?php

use yii\helpers\Html;
use yii\grid\GridView;
use mdm\admin\components\RouteRule;
use mdm\admin\components\Configs;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $searchModel mdm\admin\models\searchs\AuthItem */
/* @var $context mdm\admin\components\ItemController */

$context = $this->context;
$labels = $context->labels();
$this->title = Yii::t('rbac-admin', $labels['Items']);
$this->params['breadcrumbs'][] = $this->title;

$rules = array_keys(Configs::authManager()->getRules());
$rules = array_combine($rules, $rules);
unset($rules[RouteRule::RULE_NAME]);
?>
<div class="panel panel-primary" id="panel-primary-mpc">
    <div class="panel-heading" id="panel-heading-mpc">Lista de Roles</div>
    <div class="panel-body">
        <div class="role-index">
            <?=
            GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    [
                        'attribute' => 'name',
                        'label' => Yii::t('rbac-admin', 'Name'),
                    ],
                    [
                        'attribute' => 'description',
                        'label' => Yii::t('rbac-admin', 'Description'),
                    ],
                    ['class' => 'yii\grid\ActionColumn',],
                ],
            ])
            ?>

        </div>
    </div>
</div>
