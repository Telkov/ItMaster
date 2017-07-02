<?php

namespace app\controllers;

use app\models\DeleteId;
use app\models\Inbox;
use app\models\Prepare;
use app\models\MailForm;
use app\models\Sent;
use yii\web\JsonParser;
use Yii;


class MailController extends AppController
{
    public $obj;
    public $ids;


    //Функционал отправки письма и добавление новых писем в БД
    public function actionSec()
    {
        $mail = new MailForm();
        $mail->date_dep = date("d.m.Y H:i");
        if ($mail->load(Yii::$app->request->post())) {
            if ($mail->save()) {
                Yii::$app->mailer->compose()
                    ->setFrom(['mailertest.dev@gmail.com' => 'ItMAster TEST'])
                    ->setTo($mail->recipient)
                    ->setSubject($mail->subject)
                    ->setTextBody($mail->message)
                    ->send();
                return $this->refresh();
            }
        }

        return $this->render('secondary', ['mail' => $mail]);

//        return $this->render('sent', ['mail' => $mail, 'sentmsg' => $sentmsg, 'countsentmsg'=> $countsentmsg]);
    }

    public function actionSent(){
        $sentmsg = Sent::find()->asArray()->all(); //выборка в массив
        return $this->render('sent',  ['sentmsg' => $sentmsg]);
    }

    //Удаление писем
    public function actionDelete()
    {
        if (Yii::$app->request->isAjax) {
            $obj = $_POST['jsonObj'];
        }
        $new = new Prepare(); //приведем строковое значение переменной к нужному виду
        $ids = $new->transform($obj);
        $query = "DELETE FROM Sent WHERE id in (".$ids.")"; //создаем запрос на удаление и следом удаляем
        return Yii::$app->db
            ->createCommand($query)
            ->queryAll();
    }

    //Вывод входящих
    public function actionInbox()
    {
        $host = '{imap.gmail.com:993/imap/ssl/novalidate-cert}INBOX';
        $user = 'mailertest.dev@gmail.com';
        $pass = 'Test123456';
        $inmails = new Inbox();
        $allinbox =  $inmails->getMail($host, $user, $pass); //получаем все входящие письма в виде массива
//        debug($allinbox);
        return $this->render('inbox', ['allinbox' => $allinbox]);
    }

    public function actionDelin()
    {
        $host = '{imap.gmail.com:993/imap/ssl/novalidate-cert}INBOX';
        $user = 'mailertest.dev@gmail.com';
        $pass = 'Test123456';
        $listmails = 1;
        $delmails = new Inbox();
        $delmails->delMail($host, $user, $pass, $list);
    }

}