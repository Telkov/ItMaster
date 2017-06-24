<?php

use yii\widgets\ActiveForm;
use yii\helpers\Html;

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
                            <td><a href="">Отправленные</td><td><?= $countsent ?></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
        <?php
        $msg = ActiveForm::begin([
            'id' => 'delmsg-form',
            'options' => ['class' => 'form-horizontal'],
        ]);

//        echo '<div class="form-group">';
        echo Html::button('Написать письмо', [
                'class' => 'btn btn-success',
                'id'=> 'newmsg',
                'data-toggle' => "modal",
            ]);

        echo Html::submitButton('Удалить выбранные',
            [
                'class' => 'btn btn-danger',
                'id'=> 'delbtn',
            ]);


        echo '<table class="table table-striped mail-msglist" style="margin-top: 20px">';
        echo '<tr>';
        echo '<th> <input type="checkbox" name="allmsg" id="check"></th>';
        echo '<th>Получатель</th>';
        echo '<th>Тема письма</th>';
        echo '<th>Дата отправления</th>';
        echo '</tr>';

        foreach ($sent as $sentmail) {
            echo '<tr>';
            echo '<td>' . Html::checkbox('cbname'.$sentmail["id"], false, ['id' => $sentmail["id"]]) .'</td>';
            echo '<td>' . $sentmail["recipient"] . '</td>';
            echo '<td>' . $sentmail["subject"] . '</td>';
            echo '<td>' . $sentmail["date_dep"] . '</td>';
            echo '</tr>';
        }
        echo '</table>';

        ActiveForm::end();
        ?>

    </div>
</div>




