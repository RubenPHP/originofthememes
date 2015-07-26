<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\bootstrap\ActiveForm;
use \dmstr\bootstrap\Tabs;
use \kartik\select2\Select2;

use common\models\User;
use common\models\Category;
use common\models\Author;
use common\models\Tag;
use common\models\Vidmage;
use common\models\Meme;
use common\models\Platform;

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
        			<?= $form->field($model, 'id_url')->textInput(['maxlength' => true]) ?>
        			<?= $form->field($model, 'platform_id')->dropDownList(Platform::getMappedArray()) ?>
                    <?php if (!$model->isNewRecord): ?>
                        <?= $form->field($model, 'views')->textInput() ?>
                    <?php endif ?>
                    <?= $form->field($model, 'is_active')->checkBox() ?>

                    <div class="form-group">
                        <label class="control-label col-sm-3" for="vidmage-vidmagememes">
                            Memes
                        </label>
                        <div class="col-sm-6">
                            <?=
                                Select2::widget([
                                    'name' => 'vidmageMemes',
                                    'data' => Meme::getMappedArray(),
                                    'value' => ArrayHelper::getColumn($model->memeVidmages, 'meme_id'),//selected values. Load $vidmage->vidmageCategories as array
                                    'options' => [
                                        'placeholder' => 'Select a Meme ...',
                                        'multiple' => true,
                                    ],

                                    'pluginOptions' => [
                                        'tags' => true,
                                        //'tokenSeparators' => [','],
                                    ],
                                ]);
                            ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-3" for="vidmage-vidmagecategories">
                            <?= $model->getAttributeLabel('vidmageCategories') ?>
                        </label>
                        <div class="col-sm-6">
                            <?=
                                //$form->field($model, 'vidmageCategories')->widget(Select2::classname(), [
                                Select2::widget([
                                    'name' => 'vidmageCategories',
                                    'data' => Category::getMappedArray(),
                                    'value' => ArrayHelper::getColumn($model->vidmageCategories, 'category_id'),//selected values. Load $vidmage->vidmageCategories as array
                                    'options' => [
                                        'placeholder' => 'Select a category ...',
                                        'multiple' => true,
                                    ],

                                    'pluginOptions' => [
                                        //'tags' => true,
                                        //'tokenSeparators' => [',', ' '],
                                    ],
                                ]);
                            ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3" for="vidmage-vidmageauthors">
                            <?= $model->getAttributeLabel('vidmageAuthors') ?>
                        </label>
                        <div class="col-sm-6">
                            <?=
                                Select2::widget([
                                    'name' => 'vidmageAuthors',
                                    'data' => Author::getMappedArray(),
                                    'value' => ArrayHelper::getColumn($model->vidmageAuthors, 'author_id'),//selected values. Load $vidmage->vidmageCategories as array
                                    'options' => [
                                        'placeholder' => 'Select an author ...',
                                        'multiple' => true,
                                    ],

                                    'pluginOptions' => [
                                        'tags' => true,
                                        'tokenSeparators' => [','],
                                    ],
                                ]);
                            ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3" for="vidmage-vidmagetags">
                            <?= $model->getAttributeLabel('vidmageTags') ?>
                        </label>
                        <div class="col-sm-6">
                            <?=
                                Select2::widget([
                                    'name' => 'vidmageTags',
                                    'data' => Tag::getMappedArray(),
                                    'value' => ArrayHelper::getColumn($model->vidmageTags, 'tag_id'),//selected values. Load $vidmage->vidmageCategories as array
                                    'options' => [
                                        'placeholder' => 'Select a tag ...',
                                        'multiple' => true,
                                    ],

                                    'pluginOptions' => [
                                        'tags' => true,
                                        'tokenSeparators' => [',', ' '],
                                    ],
                                ]);
                            ?>
                        </div>
                    </div>
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
