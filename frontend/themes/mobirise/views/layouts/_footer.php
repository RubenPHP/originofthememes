<?php

use common\models\Category;
use common\models\Tag;
use common\models\Author;
use common\models\Meme;
use common\models\Vidmage;

/*TODO: create widget*/

$channels = Category::find()->all();

$tags = Tag::find()
        ->orderBy(['recount' => SORT_DESC])
        ->limit(10)
        ->all();

$authors = Author::find()
        ->orderBy(['recount' => SORT_DESC])
        ->limit(5)
        ->all();

$latestMemes = Meme::find()
        ->orderBy(['id' => SORT_DESC])
        ->limit(10)
        ->all();

$latestReplicas = Vidmage::find()
        ->joinWith('memeVidmages')
        ->where(['meme_vidmage.is_the_origin' => false])
        ->orderBy(['id' => SORT_DESC])
        ->limit(10)
        ->all();
?>

<section class="mbr-section mbr-section--relative mbr-section--fixed-size" id="contacts1-19" style="background-color: rgb(60, 60, 60);">
    <div class="mbr-section__container container">
        <div class="mbr-contacts mbr-contacts--wysiwyg row">
            <div class="col-sm-12">
               <div class="row">
                    <div class="col-sm-3">
                        <p class="mbr-contacts__text">
                            <span class="glyphicon glyphicon-globe glyphicon-1-5x"></span>
                            <strong>Latest Memes</strong>
                        </p>
                        <ul class="mbr-contacts__list">
                            <?php foreach ($latestMemes as $meme): ?>
                                <li>
                                    <a class="mbr-contacts__link text-gray" href="<?= $meme->siteUrl ?>"><?= $meme->name ?></a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <div class="col-sm-3">
                        <p class="mbr-contacts__text">
                            <span class="glyphicon glyphicon-blackboard glyphicon-1-5x"></span>
                            <strong>Channels</strong>
                        </p>
                        <ul class="mbr-contacts__list">
                            <?php foreach ($channels as $channel): ?>
                                <li>
                                    <a class="mbr-contacts__link text-gray" href="<?= $channel->siteUrl ?>"><?= $channel->name ?></a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <div class="col-sm-3">
                        <p class="mbr-contacts__text">
                            <span class="glyphicon glyphicon-user glyphicon-1-5x"></span>
                            <strong>Authors</strong>
                        </p>
                        <ul class="mbr-contacts__list">
                            <?php foreach ($authors as $author): ?>
                                <li>
                                    <a class="mbr-contacts__link text-gray" href="<?= $author->siteUrl ?>"><?= $author->name ?></a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <div class="col-sm-3">
                       <p class="mbr-contacts__text">
                           <span class="glyphicon glyphicon-tag glyphicon-1-5x"></span>
                           <strong>Trending Tags</strong>
                       </p>
                       <ul class="mbr-contacts__list">
                           <?php foreach ($tags as $tag): ?>
                               <li>
                                   <a class="mbr-contacts__link text-gray" href="<?= $tag->siteUrl ?>"><?= $tag->name ?></a>
                               </li>
                           <?php endforeach; ?>
                       </ul>
                   </div>
                </div>
            </div>
        </div>
    </div>
</section>
