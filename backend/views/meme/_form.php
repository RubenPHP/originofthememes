<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\bootstrap\ActiveForm;
use \dmstr\bootstrap\Tabs;
use \Zelenin\yii\widgets\Summernote\Summernote;
use \kartik\select2\Select2;

use common\models\Vidmage;

/**
* @var yii\web\View $this
* @var common\models\Meme $model
* @var yii\widgets\ActiveForm $form
*/

?>

<div class="panel panel-default">
    <div class="panel-heading">
        <h2>
                <?= $model->name ?>        </h2>
    </div>

    <div class="panel-body">

        <div class="meme-form">

            <?php $form = ActiveForm::begin([
            'id' => 'Meme',
            'layout' => 'horizontal',
            'enableClientValidation' => true,
            'errorSummaryCssClass' => 'error-summary alert alert-error'
            ]
            );
            ?>

            <div class="">
                <?php $this->beginBlock('main'); ?>

                <p>
                    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

                    <div class="form-group">
                        <label class="control-label col-sm-3" for="meme-memevidmageOrigin">
                            Vidmage Origin
                        </label>
                        <div class="col-sm-6">
                            <?=
                                Select2::widget([
                                    'name' => 'memeVidmageOrigin',
                                    'data' => Vidmage::getMappedArray(),
                                    'value' => $model->originMemeVidmageAsArray,//selected values. Load $vidmage->vidmageCategories as array
                                    'options' => [
                                        'placeholder' => 'Select Vidmage Origin ...',
                                        'multiple' => false,
                                    ],

                                    'pluginOptions' => [
                                        'tags' => false,
                                    ],
                                ]);
                            ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-3" for="meme-memevidmages">
                            Vidmages
                        </label>
                        <div class="col-sm-6">
                            <?=
                                Select2::widget([
                                    'name' => 'memeVidmages',
                                    'data' => Vidmage::getMappedArray(),
                                    'value' => ArrayHelper::getColumn($model->notOriginMemeVidmages, 'vidmage_id'),//selected values. Load $vidmage->vidmageCategories as array
                                    'options' => [
                                        'placeholder' => 'Select a Vidmage ...',
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

                    <?= $form->field($model, 'description')->widget(Summernote::className(),[
                                                'clientOptions' => []
                    ]) ?>

                    <?= $form->field($model, 'url_info')->textInput(['maxlength' => true]) ?>
                </p>
                <?php $this->endBlock(); ?>

                <?=
    Tabs::widget(
                 [
                   'encodeLabels' => false,
                     'items' => [ [
    'label'   => 'Meme',
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
