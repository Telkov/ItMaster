<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use yii\bootstrap\Modal;
use app\models\Sent;
use app\models\MailForm;
use app\components\CountsWidget;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => 'My Company',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
            ['label' => 'Home', 'url' => ['/site/index']],
            Yii::$app->user->isGuest ? (
                ['label' => 'Login', 'url' => ['/site/login']]
            ) : (
                '<li>'
                . Html::beginForm(['/site/logout'], 'post')
                . Html::submitButton(
                    'Logout (' . Yii::$app->user->identity->username . ')',
                    ['class' => 'btn btn-link logout']
                )
                . Html::endForm()
                . '</li>'
            )
        ],
    ]);
    NavBar::end();
    ?>

    <div class="container" style="width: 100%;">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>

        <div class="row">

            <?php
            $msg = ActiveForm::begin([

                'id' => 'delmsg-form',
                'options' => ['class' => 'form-horizontal',  'name' => 'delform', 'method' => 'get'],
            ]);

            echo '<div class="form-group buttons-block">';
            ?>
            <!--            //Модальное окно-->
            <?php
            Modal::begin([
                'id' => 'myModal',
                'header' => '<p style="text-align: center">Новое сообщение</p>',
                'size' => 'modal-lg',
                'toggleButton' => [
                    'label' => 'Написать письмо',
                    'tag' => 'button',
                    'class' => 'btn btn-success',
                    'id' => 'new-msg-button'
                ],
            ]);
            //    ?>
            <div class="container-fluid modal-form">
                <?php
                if(Yii::$app->session->hasFlash('succes')):
                    ?>
                    <div class="alert alert-success alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <?= Yii::$app->session->getFlash('succes'); ?>
                    </div>
                <?php endif; ?>

                <?php
                if(Yii::$app->session->hasFlash('error')):
                    ?>
                    <div class="alert alert-danger alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <?= Yii::$app->session->getFlash('error'); ?>
                    </div>
                <?php endif; ?>

                <?php
                $mform = ActiveForm::begin([
                    'id' => 'mail-form',
                    'options' => ['class' => 'form-horizontal'],
                    'fieldConfig' => [
                        'template' => '<div class="form-group">
                                {label}
                                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
                                    {input}
                                </div>
                                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
                                    {error}
                                </div>
                            </div>',
                        'labelOptions' => ['class' => 'col-lg-3 col-md-3 col-sm-3 col-xs-3 control-label'],
                    ],
                ]);
                ?>
<!--                        --><?//= $mform->field($mail, 'recipient')->input('email', ['placeholder' => 'Введите email получателя']); ?>
                            <?php debug($mail); ?>
                        ?>
<!--                        --><?//= $mform->field($mail, 'subject')->input('string',['placeholder' => 'Введите тему письма']); ?>
<!--                        --><?//= $mform->field($mail, 'message')->textarea(['rows' => 7, 'placeholder' => 'Введите текст сообщения']); ?>
                <div class="form-group" align="right">
                    <div>
                        <?= Html::submitButton('Отправить', ['class' => 'btn btn-success']) ?>
                    </div>
                </div>

                <?php ActiveForm::end() ?>
            </div>
            <?php Modal::end()?>
            <?php
            echo Html::submitButton('Удалить выбранные',
                [
                    'class' => 'btn btn-danger',
                    'id'=> 'delete-msg-button',
                ]);
            echo ' <div class="col-lg-3 col-md-4 col-sm-5 col-xs-7 search-form">
                    <input type="text" id="filter"  value="" class="form-control search-field" placeholder="Введите email или дату">
                    </div>'
            ?>

            <?php
            $inboxurl = Url::toRoute(['mail/inbox']);
            $senturl = Url::toRoute(['mail/sent']);
            ?>

        </div>
        <div class="row">
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                <div class="mail-sidebar">
                    <div class="mail-sidebar__tab">
                        <p>Почта</p>
                    </div>
                    <div class="mail-sidebar__menu">
                        <div class="mail-sidebar__menu_table">
                            <table cellspacing="0">
                                <tr>
                                    <td><a href=<?= $inboxurl?> >Входящие</a></td><td><?= CountsWidget::widget(); ?> </td>
                                </tr>
                                <tr>
                                    <td><a href=<?= $senturl ?> >Отправленные</td><td><?= $this->params['countsentmsg'] ?></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10 msgs-table">
                <?= $content ?>

            </div>

            <?php ActiveForm::end(); ?>

        </div>

    </div>



</div>

<!--<footer class="footer">-->
<!--    <div class="container">-->
<!--        <p class="pull-left">&copy; My Company --><?//= date('Y') ?><!--</p>-->
<!---->
<!--        <p class="pull-right">--><?//= Yii::powered() ?><!--</p>-->
<!--    </div>-->
<!--</footer>-->

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
