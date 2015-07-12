<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var common\models\VidmageAuthorSearch $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="vidmage-author-search">

	<?php $form = ActiveForm::begin([
		'action' => ['index'],
		'method' => 'get',
	]); ?>

		<?= $form->field($model, 'id') ?>

		<?= $form->field($model, 'vidmage_id') ?>

		<?= $form->field($model, 'author_id') ?>

		<?= $form->field($model, 'is_main_author') ?>

		<div class="form-group">
			<?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
			<?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
		</div>

	<?php ActiveForm::end(); ?>

</div>
