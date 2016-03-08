<?php
use frontend\widgets\EditorsPickMemeWidget;
use frontend\widgets\FeaturedMemeWidget;
use frontend\widgets\ReplicaListWidget;
use frontend\widgets\MemeListWidget;

/* @var $this yii\web\View */
$this->title = 'Origin of the Memes';
$this->registerMetaTag([
    'name' => 'description',
    'content' => Yii::t('app','Find the origin of the most popular memes on Internet. Enjoy watching memes from vine, youtube, instagram and more.')
]);
?>

<?= FeaturedMemeWidget::widget(['meme'=>$mostPopularMeme, 'theme'=>'mobirise']) ?>

<section class="mbr-section" id="header3-11">
    <div class="mbr-section__container container mbr-section__container--first">
        <div class="mbr-header mbr-header--wysiwyg row">
            <div class="col-sm-8 col-sm-offset-2">
                <h3 class="mbr-header__text">NEW MEMES</h3>

            </div>
        </div>
    </div>
</section>

<?= MemeListWidget::widget(['memes'=>$newMemes, 'theme'=>'mobirise', 'sliderId'=>'slider-new-memes']) ?>

<?= EditorsPickMemeWidget::widget(['meme'=>$editorMemePick, 'theme'=>'mobirise']) ?>

<section class="mbr-section" id="header3-13">
    <div class="mbr-section__container container mbr-section__container--first">
        <div class="mbr-header mbr-header--wysiwyg row">
            <div class="col-sm-8 col-sm-offset-2">
                <h3 class="mbr-header__text">NEW REPLICAS</h3>
            </div>
        </div>
    </div>
</section>

<?= MemeListWidget::widget(['memes'=>$newReplicas, 'theme'=>'mobirise', 'sliderId'=>'slider-new-replicas']) ?>
