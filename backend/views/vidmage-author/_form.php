<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use \dmstr\bootstrap\Tabs;

use common\models\Vidmage;
use common\models\Author;

/**
* @var yii\web\View $this
* @var common\models\VidmageAuthor $model
* @var yii\widgets\ActiveForm $form
*/

?>

<div class="panel panel-default">
    <div class="panel-heading">
        <h2>
                <?= $model->id ?>        </h2>
    </div>

    <div class="panel-body">

        <div class="vidmage-author-form">

            <?php $form = ActiveForm::begin([
            'id' => 'VidmageAuthor',
            'layout' => 'horizontal',
            'enableClientValidation' => true,
            'errorSummaryCssClass' => 'error-summary alert alert-error'
            ]
            );
            ?>

            <div class="">
                <?php $this->beginBlock('main'); ?>

                <p>
                    
			<?= $form->field($model, 'vidmage_id')->dropDownList(Vidmage::getMappedArray()) ?>
			<?= $form->field($model, 'author_id')->dropDownList(Author::getMappedArray()) ?>
			<?= $form->field($model, 'is_main_author')->checkBox() ?>
                </p>
                <?php $this->endBlock(); ?>
                
                <?=
    Tabs::widget(
                 [
                   'encodeLabels' => false,
                     'items' => [ [
    'label'   => 'VidmageAuthor',
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
