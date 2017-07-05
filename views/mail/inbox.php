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
echo '<th>Отправитель</th>';
echo '<th>Тема письма</th>';
echo '<th>Дата отправления</th>';
echo '</tr>';
$i=1;
//выводим содержимое
foreach($allinbox as $array){
    $url = Url::toRoute(['letter/inbox', 'uid' => $array['uid'] ]);
    echo '<tr>';
    echo '<td>' . Html::checkbox('cbox', false, ['id' => $array['id'], 'value' => $i++, 'class' => 'check-col']) . '</td>';
    echo '<td class="email">' . "<a href=$url target='_blank'>" . $array['from'] . '</td>';
    echo '<td class="subject">' . "<a href=$url target='_blank'>" . $array['subject'] . '</td>';
    echo '<td class="date">' . "<a href=$url target='_blank'>" .$array['date'] . '</td>';
    echo '</tr>';
}
echo '</table>';

?>
