<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var common\models\AuthorSearch $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="author-search">

	<?php $form = ActiveForm::begin([
		'action' => ['index'],
		'method' => 'get',
	]); ?>

		<?= $form->field($model, 'id') ?>

		<?= $form->field($model, 'name') ?>

		<?= $form->field($model, 'biography') ?>

		<?= $form->field($model, 'url_info') ?>

		<?= $form->field($model, 'url_vine') ?>

		<?php // echo $form->field($model, 'url_instagram') ?>

		<?php // echo $form->field($model, 'url_youtube') ?>

		<?php // echo $form->field($model, 'handle_twitter') ?>

		<?php // echo $form->field($model, 'handle_snapchat') ?>

		<?php // echo $form->field($model, 'is_famous') ?>

		<div class="form-group">
			<?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
			<?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
		</div>

	<?php ActiveForm::end(); ?>

</div>
