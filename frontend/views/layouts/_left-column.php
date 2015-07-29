<?php
use yii\helpers\Html;

use common\models\Category;
use common\models\Tag;
use common\models\Author;
use common\models\Meme;
use common\models\Vidmage;

use common\helpers\Tools;


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

<?= $this->render('_left-column-list-items', ['items' => $latestMemes,
                                              'title' => 'Latest Memes',
                                              'icon' => 'globe',
                                              'divId' => 'latest-memes',
                                              'class' => 'success']) ?>

<?= $this->render('_left-column-list-items', ['items' => $latestReplicas,
                                              'title' => 'Latest Replicas',
                                              'icon' => 'globe',
                                              'divId' => 'latest-replicas',
                                              'class' => 'info']) ?>

<?= $this->render('_left-column-list-items', ['items' => $channels,
                                              'title' => 'Channels',
                                              'icon' => 'blackboard',
                                              'divId' => 'channels',
                                              'class' => 'warning']) ?>

<?= $this->render('_left-column-list-items', ['items' => $tags,
                                              'title' => 'Trending Tags',
                                              'icon' => 'tag',
                                              'divId' => 'tags',
                                              'class' => 'danger']) ?>

<?= $this->render('_left-column-list-items', ['items' => $authors,
                                              'title' => 'Popular Authors',
                                              'icon' => 'user',
                                              'divId' => 'authors',
                                              'class' => 'danger']) ?>
