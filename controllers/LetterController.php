<?php

namespace app\controllers;
use app\models\Inbox;
use app\models\Sent;
use Yii;

class LetterController extends AppController
{
    public function actionSent()
    {
        //выбираем строку из базы по переданному get запросу
        $id = Yii::$app->request->get('id');
        $letter = Sent::find()->asArray()->where(['id'=> $id])->all();
        foreach ($letter as $let){
            $date = $let['date_dep'];
            $email = '<b>Получатель: </b>' . $let['recipient'];
            $subject = '<b>Тема письма: </b>' . $let['subject'];
            $body = $let['message'];
        }
        return $this ->render('letter', compact('date', 'email', 'subject', 'body'));
    }

    public function actionInbox()
    {
        $uid = Yii::$app->request->get('uid');
        $inbox = new Inbox();
        $arr = $inbox->getMail();
//        debug($arr);
        foreach ($arr as $key => $value){
            foreach ($value as $k => $v){
                if($uid == $v){
                    $res = $key;
                }
            }
        }
        $date = $arr[$res]['date'];
        $email = '<b>Отправитель: </b>' . $arr[$res]['from'];
        $subject = '<b> Тема письма: </b>' . $arr[$res]['subject'];
        $body = $arr[$res]['body'];
        return $this ->render('letter', compact('date', 'email', 'subject', 'body'));
    }
}