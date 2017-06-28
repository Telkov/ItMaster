<?php
use yii\helpers\Html;
use app\models\Sent;
?>
<div class="message-show">
    <table class="table table-message-view">
<?php

foreach ($letter as $let) {
    echo '<tr><td><i>' . $let['date_dep'] . '</i></td></tr>';
    echo '<tr><td><b>Получатель: </b><i>' . $let['recipient'] . '</i></td></tr>';
    echo '<tr><td><b>Тема письма: </b><i>' . $let['subject'] . '</i></td></tr>';
    echo '<tr><td><i>' . $let['message'] . '</i></td></tr>';
}
?>
    </table>
</div>

