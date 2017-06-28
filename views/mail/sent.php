<?php
use app\models\MailForm;
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\Modal;
use app\models\Sent;
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
                            <td><a href="">Входящие</a></td><td>##</td>
                        </tr>
                        <tr>
                            <td><a href="">Отправленные</td><td><?= $countsentmsg ?></td>
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

        echo '<div class="form-group buttons-block">';
        ?>

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
        echo '</div>';

        echo '<table class="table table-striped mail-msglist" style="margin-top: 20px">';
        echo '<tr>';
        echo '<th class="check-col">';
        echo '<input type="button" class="btn check-btn" value="+" onclick="check();">&nbsp;';
        echo '<input type="button" class="btn check-btn" value="-" onclick="uncheck();">';
        echo '</th>';
        echo '<th>Получатель</th>';
        echo '<th>Тема письма</th>';
        echo '<th>Дата отправления</th>';
        echo '</tr>';
        $i=1;

        foreach ($sentmsg as $sentmails) {
            $url = Url::toRoute(['letter/show', 'id' => $sentmails['id']]);
            echo '<tr>';
            echo '<td>' . Html::checkbox('cbox', false, ['id' => $sentmails["id"], 'value'=> $i++, 'class' => 'check-col']) .'</td>';
            echo '<td class="recipient">'."<a href=$url>" . $sentmails["recipient"] . '</a></td>';
            echo '<td class="subject">' . $sentmails["subject"] . '</td>';
            echo '<td class="date_dep">' . $sentmails["date_dep"] . '</td>';
            echo '</tr>';
        }
        echo '</table>';

        ActiveForm::end();
        ?>

    </div>
</div>




