<?php
use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'My Yii Application';

$url = Url::toRoute(['site/login']);
?>

<div class="site-index">
    <div class="jumbotron">
        <h1>Привет!</h1>

        <p class="lead">Тестовое задание реализовано с помощью фреймфорка Yii 2.0</p>

        <!-- <p><a class="btn btn-lg btn-success" href="http://itmaster/web/index.php?r=site/login">Вперед</a></p> -->
        <p><a class="btn btn-lg btn-success" href= <?= $url ?> >Вперед</a></p>
    </div>
</div>
