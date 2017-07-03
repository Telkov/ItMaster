<?php
use app\components\CountSentWidget;
use  app\components\CountInboxWidget;
use app\components\SentWidget;
use app\components\InboxWidget;
use yii\bootstrap\ActiveForm;
use yii\bootstrap\Modal;
use yii\helpers\Html;
use yii\helpers\Url;
use app\models\MailForm;

$inboxurl = Url::toRoute(['mail/inbox']);
$senturl = Url::toRoute(['mail/sent']);
?>

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
                            <td><a href= <?= $inboxurl ?> >Входящие</a></td><td><?= CountInboxWidget::widget(); ?></td>
                        </tr>
                        <tr>
                            <td><a href= <?= $senturl ?> >Отправленные</td><td><?= CountSentWidget::widget(); ?></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10 msgs-table">
        <?php
        $msg = ActiveForm::begin([

            'id' => 'delmsg-form',
            'options' => ['class' => 'form-horizontal',  'name' => 'delform', 'method' => 'get'],
        ]);
        ?>

        <div class="form-group buttons-block">

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
        ?>
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

            <!--            //Модальное окно-->
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
            <?= $mform->field($mail, 'recipient')->input('email', ['placeholder' => 'Введите email получателя']); ?>
            <?= $mform->field($mail, 'subject')->input('string',['placeholder' => 'Введите тему письма']); ?>
            <?= $mform->field($mail, 'message')->textarea(['rows' => 7, 'placeholder' => 'Введите текст сообщения']); ?>
            <div class="form-group" align="right">
                <div>
                    <?= Html::submitButton('Отправить', ['class' => 'btn btn-success']) ?>
                </div>
            </div>

            <?php ActiveForm::end() ?>
        </div> <!-- закрывает модальный блок-->
        <?php Modal::end()?>

        <?php
        echo Html::submitButton('Удалить выбранные',
            [
                'class' => 'btn btn-danger',
                'id'=> 'delete-msg-button',
            ]);
        echo ' <div class="col-lg-3 col-md-4 col-sm-5 col-xs-7 search-form">
            <input type="text" id="filter"  value="" class="form-control search-field" placeholder="Введите email или дату">
            </div>';
        ?>

        <?php

        echo SentWidget::widget();

        echo InboxWidget::widget();
//            echo $widget;
            ActiveForm::end();
        ?>

        </div>
    </div>
</div>

























