<?php

use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var common\models\Author $model
 */

$this->title = 'Author ' . $model->name . ', ' . Yii::t('app', 'Edit');
$this->params['breadcrumbs'][] = ['label' => 'Authors', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => (string)$model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Edit');
?>
<div class="giiant-crud author-update">

    <p>
        <?= Html::a('<span class="glyphicon glyphicon-eye-open"></span> ' . Yii::t('app', 'View'), ['view', 'id' => $model->id], ['class' => 'btn btn-default']) ?>
    </p>

	<?php echo $this->render('_form', [
		'model' => $model,
	]); ?>

</div>
