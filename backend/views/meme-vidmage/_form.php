<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use \dmstr\bootstrap\Tabs;

use common\models\Meme;
use common\models\Vidmage;

/**
* @var yii\web\View $this
* @var common\models\MemeVidmage $model
* @var yii\widgets\ActiveForm $form
*/

?>

<div class="panel panel-default">
    <div class="panel-heading">
        <h2>
                <?= $model->id ?>        </h2>
    </div>

    <div class="panel-body">

        <div class="meme-vidmage-form">

            <?php $form = ActiveForm::begin([
            'id' => 'MemeVidmage',
            'layout' => 'horizontal',
            'enableClientValidation' => true,
            'errorSummaryCssClass' => 'error-summary alert alert-error'
            ]
            );
            ?>

            <div class="">
                <?php $this->beginBlock('main'); ?>

                <p>
            <?= $form->field($model, 'meme_id')->dropDownList(Meme::getMappedArray()) ?>
            <?= $form->field($model, 'vidmage_id')->dropDownList(Vidmage::getMappedArray()) ?>
			<?= $form->field($model, 'is_the_origin')->checkBox() ?>
			<?= $form->field($model, 'likes')->textInput() ?>
                </p>
                <?php $this->endBlock(); ?>

                <?=
    Tabs::widget(
                 [
                   'encodeLabels' => false,
                     'items' => [ [
    'label'   => 'MemeVidmage',
    'content' => $this->blocks['main'],
    'active'  => true,
], ]
                 ]
    );
    ?>
                <hr/>
                <?php echo $form->errorSummary($model); ?>
                <?= Html::submitButton(
                '<span class="glyphicon glyphicon-check"></span> ' .
                ($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Save')),
                [
                    'id' => 'save-' . $model->formName(),
                    'class' => 'btn btn-success'
                ]
                );
                ?>

                <?php ActiveForm::end(); ?>

            </div>

        </div>

    </div>

</div>
