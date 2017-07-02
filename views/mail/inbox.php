<?php
use app\models\MailForm;
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\Modal;
use app\models\Sent;
?>

<?php
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

foreach($allinbox as $array){
   $url = Url::toRoute(['letter/inbox', 'uid' => $array['uid'], 'arr'=> $allinbox]);
   echo '<tr>';
   echo '<td>' . Html::checkbox('cbox', false, ['id' => $array['id'], 'value' => $i++, 'class' => 'check-col']) . '</td>';
   echo '<td>' . "<a href=$url target='_blank'>" . $array['from'] . '</td>';
   echo '<td>' . "<a href=$url target='_blank'>" . $array['subject'] . '</td>';
   echo '<td>' . "<a href=$url target='_blank'>" .$array['date'] . '</td>';
   echo '</tr>';
}
?>
