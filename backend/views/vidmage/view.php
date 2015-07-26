<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\widgets\DetailView;
use yii\widgets\Pjax;
use dmstr\bootstrap\Tabs;

/**
* @var yii\web\View $this
* @var common\models\Vidmage $model
*/

$this->title = 'Vidmage ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Vidmages', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => (string)$model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'View');
?>
<div class="giiant-crud vidmage-view">

    <!-- menu buttons -->
    <p class='pull-left'>
        <?= Html::a('<span class="glyphicon glyphicon-pencil"></span> ' . Yii::t('app', 'Edit'), ['update', 'id' => $model->id],['class' => 'btn btn-info']) ?>
        <?= Html::a('<span class="glyphicon glyphicon-plus"></span> ' . Yii::t('app', 'New'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <p class="pull-right">
        <?= Html::a('<span class="glyphicon glyphicon-list"></span> ' . Yii::t('app', 'List Vidmages'), ['index'], ['class'=>'btn btn-default']) ?>
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
                <?= $model->name ?>            </h2>
        </div>

        <div class="panel-body">



    <?php $this->beginBlock('common\models\Vidmage'); ?>

    <?= DetailView::widget([
    'model' => $model,
    'attributes' => [
            'id',
        'user_id',
        'name',
        'id_url',
        'views',
        'is_active',
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


    
<?php $this->beginBlock('MemeVidmages'); ?>
<div style='position: relative'><div style='position:absolute; right: 0px; top 0px;'>
  <?= Html::a(
            '<span class="glyphicon glyphicon-list"></span> ' . Yii::t('app', 'List All') . ' Meme Vidmages',
            ['meme-vidmage/index'],
            ['class'=>'btn text-muted btn-xs']
        ) ?>
  <?= Html::a(
            '<span class="glyphicon glyphicon-plus"></span> ' . Yii::t('app', 'New') . ' Meme Vidmage',
            ['meme-vidmage/create', 'MemeVidmage' => ['vidmage_id' => $model->id]],
            ['class'=>'btn btn-success btn-xs']
        ); ?>
</div></div><?php $this->endBlock() ?>


<?php $this->beginBlock('VidmageAuthors'); ?>
<div style='position: relative'><div style='position:absolute; right: 0px; top 0px;'>
  <?= Html::a(
            '<span class="glyphicon glyphicon-list"></span> ' . Yii::t('app', 'List All') . ' Vidmage Authors',
            ['vidmage-author/index'],
            ['class'=>'btn text-muted btn-xs']
        ) ?>
  <?= Html::a(
            '<span class="glyphicon glyphicon-plus"></span> ' . Yii::t('app', 'New') . ' Vidmage Author',
            ['vidmage-author/create', 'VidmageAuthor' => ['vidmage_id' => $model->id]],
            ['class'=>'btn btn-success btn-xs']
        ); ?>
</div></div><?php $this->endBlock() ?>


<?php $this->beginBlock('VidmageCategories'); ?>
<div style='position: relative'><div style='position:absolute; right: 0px; top 0px;'>
  <?= Html::a(
            '<span class="glyphicon glyphicon-list"></span> ' . Yii::t('app', 'List All') . ' Vidmage Categories',
            ['vidmage-category/index'],
            ['class'=>'btn text-muted btn-xs']
        ) ?>
  <?= Html::a(
            '<span class="glyphicon glyphicon-plus"></span> ' . Yii::t('app', 'New') . ' Vidmage Category',
            ['vidmage-category/create', 'VidmageCategory' => ['vidmage_id' => $model->id]],
            ['class'=>'btn btn-success btn-xs']
        ); ?>
</div></div><?php $this->endBlock() ?>


<?php $this->beginBlock('VidmageTags'); ?>
<div style='position: relative'><div style='position:absolute; right: 0px; top 0px;'>
  <?= Html::a(
            '<span class="glyphicon glyphicon-list"></span> ' . Yii::t('app', 'List All') . ' Vidmage Tags',
            ['vidmage-tag/index'],
            ['class'=>'btn text-muted btn-xs']
        ) ?>
  <?= Html::a(
            '<span class="glyphicon glyphicon-plus"></span> ' . Yii::t('app', 'New') . ' Vidmage Tag',
            ['vidmage-tag/create', 'VidmageTag' => ['vidmage_id' => $model->id]],
            ['class'=>'btn btn-success btn-xs']
        ); ?>
</div></div><?php $this->endBlock() ?>


    <?= Tabs::widget(
                 [
                     'id' => 'relation-tabs',
                     'encodeLabels' => false,
                     'items' => [ [
    'label'   => '<b class=""># '.$model->id.'</b>',
    'content' => $this->blocks['common\models\Vidmage'],
    'active'  => true,
],[
    'content' => $this->blocks['MemeVidmages'],
    'label'   => '<small>Meme Vidmages <span class="badge badge-default">'.count($model->getMemeVidmages()->asArray()->all()).'</span></small>',
    'active'  => false,
],[
    'content' => $this->blocks['VidmageAuthors'],
    'label'   => '<small>Vidmage Authors <span class="badge badge-default">'.count($model->getVidmageAuthors()->asArray()->all()).'</span></small>',
    'active'  => false,
],[
    'content' => $this->blocks['VidmageCategories'],
    'label'   => '<small>Vidmage Categories <span class="badge badge-default">'.count($model->getVidmageCategories()->asArray()->all()).'</span></small>',
    'active'  => false,
],[
    'content' => $this->blocks['VidmageTags'],
    'label'   => '<small>Vidmage Tags <span class="badge badge-default">'.count($model->getVidmageTags()->asArray()->all()).'</span></small>',
    'active'  => false,
], ]
                 ]
    );
    ?>
        </div>
    </div>
</div>
