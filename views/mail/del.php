<?php
//    echo $sentmail->recipient . '<br>'; обращение к объекту
use yii\widgets\ActiveForm;
use yii\helpers\Html;

$delmsg = ActiveForm::begin([
    'id' => 'delmsg-form'
]);

echo Html::submitButton('Удалить выбранные', ['class' => 'btn btn-danger']);

echo '<table class="table table-striped mail-msglist" style="margin-top: 20px">';
echo '<tr>';
echo '<th> <input type="checkbox" name="allmsg" id="check"></th>';
echo '<th>Получатель</th>';
echo '<th>Тема письма</th>';
echo '<th>Дата отправления</th>';
echo '</tr>';

foreach ($sent as $sentmail) {
    echo '<tr>';
    echo '<td> <input type="checkbox" name="'.$sentmail["id"].'"></td>';
    echo '<th>' . $sentmail["recipient"] . '</th>';
    echo '<th>' . $sentmail["subject"] . '</th>';
    echo '<th>' . $sentmail["date_dep"] . '</th>';
    echo '</tr>';
//        echo $delmsg->field($msg, $sentmail["id"]);
}
echo '</table>';

ActiveForm::end();


echo 'Количество выбраных = ' . $checked. '<br>';
echo 'count mail is - ' . $countsent . '<br>'; // вывод кол-ва записей
//debug($sent);
?>
