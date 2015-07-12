<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\widgets\DetailView;
use yii\widgets\Pjax;
use dmstr\bootstrap\Tabs;

/**
* @var yii\web\View $this
* @var common\models\VidmageAuthor $model
*/

$this->title = 'Vidmage Author ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Vidmage Authors', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => (string)$model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'View');
?>
<div class="giiant-crud vidmage-author-view">

    <!-- menu buttons -->
    <p class='pull-left'>
        <?= Html::a('<span class="glyphicon glyphicon-pencil"></span> ' . Yii::t('app', 'Edit'), ['update', 'id' => $model->id],['class' => 'btn btn-info']) ?>
        <?= Html::a('<span class="glyphicon glyphicon-plus"></span> ' . Yii::t('app', 'New'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <p class="pull-right">
        <?= Html::a('<span class="glyphicon glyphicon-list"></span> ' . Yii::t('app', 'List VidmageAuthors'), ['index'], ['class'=>'btn btn-default']) ?>
    </p>

    <div class="clearfix"></div>

    <!-- flash message -->
    <?php if (\Yii::$app->session->getFlash('deleteError') !== null) : ?>
        <span class="alert alert-info alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
            <?= \Yii::$app->session->getFlash('deleteError') ?>
        </span>
    <?php endif; ?>

    <div class="panel panel-default">
        <div class="panel-heading">
            <h2>
                <?= $model->id ?>            </h2>
        </div>

        <div class="panel-body">



    <?php $this->beginBlock('common\models\VidmageAuthor'); ?>

    <?= DetailView::widget([
    'model' => $model,
    'attributes' => [
            'id',
        'vidmage_id',
        'author_id',
        'is_main_author',
    ],
    ]); ?>

    <hr/>

    <?= Html::a('<span class="glyphicon glyphicon-trash"></span> ' . Yii::t('app', 'Delete'), ['delete', 'id' => $model->id],
    [
    'class' => 'btn btn-danger',
    'data-confirm' => '' . Yii::t('app', 'Are you sure to delete this item?') . '',
    'data-method' => 'post',
    ]); ?>
    <?php $this->endBlock(); ?>


    
    <?= Tabs::widget(
                 [
                     'id' => 'relation-tabs',
                     'encodeLabels' => false,
                     'items' => [ [
    'label'   => '<b class=""># '.$model->id.'</b>',
    'content' => $this->blocks['common\models\VidmageAuthor'],
    'active'  => true,
], ]
                 ]
    );
    ?>
        </div>
    </div>
</div>
