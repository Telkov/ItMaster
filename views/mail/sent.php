<?php
foreach ($sent as $sentmail) {
//    echo $sentmail->recipient . '<br>'; обращение к объекту
    echo $sentmail['recipient'] . '<br>'; //обращение к массиву
}
echo 'count mail is - ' . $countsent . '<br>'; // вывод кол-ва записей
debug($sent);