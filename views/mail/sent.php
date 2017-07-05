<?php

use yii\helpers\Html;
use yii\helpers\Url;

?>

<?php
//выводим таблицу, рисуем шапку
echo '<table class="table table-striped mail-msglist">';
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
//выводим содержимое
foreach ($sentmsg as $sentmails) {
    $url = Url::toRoute(['letter/sent', 'id' => $sentmails['id']]);
    echo '<tr>';
    echo '<td>' . Html::checkbox('cbox', false, ['id' => $sentmails["id"], 'value'=> $i++, 'class' => 'check-col']) .'</td>';
    echo '<td class="email">' . "<a href=$url target='_blank'>" . $sentmails["recipient"] . '</a></td>';
    echo '<td class="subject">' . "<a href=$url target='_blank'>" . $sentmails["subject"] . '</td>';
    echo '<td class="date">' . "<a href=$url target='_blank'>" . $sentmails["date_dep"] . '</td>';
    echo '</tr>';
}
echo '</table>';

?>
