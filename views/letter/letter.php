<?php
use yii\helpers\Html;
use app\models\Sent;
?>
<div class="message-show">
    <table class="table-message-view">
<?php

foreach ($letter as $let) {
    echo '<tr><td>' . $let['date_dep'] . '</td></tr>';
    echo '<tr><td>Получатель:' . $let['recipient'] . '</td></tr>';
    echo '<tr><td>Тема письма:' . $let['subject'] . '</td></tr>';
    echo '<tr><td>' . $let['message'] . '</td></tr>';
}
?>
    </table>
</div>

