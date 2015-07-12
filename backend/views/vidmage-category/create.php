<?php

use yii\helpers\Html;

/**
* @var yii\web\View $this
* @var common\models\VidmageCategory $model
*/

$this->title = Yii::t('app', 'Create');
$this->params['breadcrumbs'][] = ['label' => 'Vidmage Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="giiant-crud vidmage-category-create">

    <p class="pull-left">
        <?= Html::a(Yii::t('app', 'Cancel'), \yii\helpers\Url::previous(), ['class' => 'btn btn-default']) ?>
    </p>
    <div class="clearfix"></div>

    <?= $this->render('_form', [
    'model' => $model,
    ]); ?>

</div>
