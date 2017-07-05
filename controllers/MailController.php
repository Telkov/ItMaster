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
    public $layout = 'second';
    public $obj;
    public $ids;

    //Функционал отправки письма и добавление новых писем в БД перенесен в виджет, см. components

    //Выборка писем из БД для построения таблицы отправленых писем
    public function actionSent()
    {
        $sentmsg = Sent::find()->asArray()->all(); //выборка в массив
        return $this->render('sent',  ['sentmsg' => $sentmsg]);
    }

    public function actionInbox()
    {
        $inmails = new Inbox();
        $allinbox =  $inmails->getMail(); //получаем все входящие письма в виде массива

        return $this->render('inbox', ['allinbox' => $allinbox]);
    }

    //Удаление отправленых писем
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