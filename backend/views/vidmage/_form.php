<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use \dmstr\bootstrap\Tabs;
use \kartik\select2\Select2;

use common\models\User;
use common\models\Category;

/**
* @var yii\web\View $this
* @var common\models\Vidmage $model
* @var yii\widgets\ActiveForm $form
*/

?>

<div class="panel panel-default">
    <div class="panel-heading">
        <h2>
                <?= $model->name ?>        </h2>
    </div>

    <div class="panel-body">

        <div class="vidmage-form">

            <?php $form = ActiveForm::begin([
            'id' => 'Vidmage',
            'layout' => 'horizontal',
            'enableClientValidation' => true,
            'errorSummaryCssClass' => 'error-summary alert alert-error'
            ]
            );
            ?>

            <div class="">
                <?php $this->beginBlock('main'); ?>
                <p>
        			<?= $form->field($model, 'user_id')->dropDownList(User::getMappedArray()) ?>
        			<?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
        			<?= $form->field($model, 'url')->textInput(['maxlength' => true]) ?>
        			<?= $form->field($model, 'views')->textInput() ?>
        			<?= $form->field($model, 'is_active')->checkBox() ?>

                    <?=
                        $form->field($model, 'vidmageCategories')->widget(Select2::classname(), [
                            'data' => Category::getMappedArray(),
                            'value' => ['Humor'],//selected values. Load $vidmage->vidmageCategories as array
                            'options' => [
                                'placeholder' => 'Select a category ...',
                                'multiple' => true,
                            ],

                            'pluginOptions' => [
                                'tags' => true,
                                'tokenSeparators' => [',', ' '],
                            ],
                        ]);
                    ?>
                </p>

                <?php $this->endBlock(); ?>

                <?=
    Tabs::widget(
                 [
                   'encodeLabels' => false,
                     'items' => [ [
    'label'   => 'Vidmage',
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
