<?php

namespace app\controllers;

use app\models\DeleteId;
use app\models\Inbox;
use app\models\Prepare;
use app\models\MailForm;
use app\models\Sent;
use yii\helpers\Url;
use yii\web\JsonParser;
use Yii;

class MailController extends AppController
{
    public $layout = 'second';
//    public $obj;
//    public $ids;
//    public $inboxurl;
//    public $senturl;
//    public $pageurl;

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
        $inboxurl = '/web/index.php?r=mail%2Finbox';
        $senturl = '/web/index.php?r=mail%2Fsent';
        $pageurl = stristr($_SERVER['HTTP_REFERER'], '/web');

        if (Yii::$app->request->isAjax) {
            $obj = $_POST['jsonObj'];
//            $pageurl = $_POST['pageurl'];
        }
        $new = new Prepare(); //приведем строковое значение переменной к нужному виду
        $ids = $new->transform($obj);

        if ($pageurl === $senturl) {
            $query = "DELETE FROM Sent WHERE id in (" . $ids . ")"; //создаем запрос на удаление и следом удаляем

            return Yii::$app->db
                ->createCommand($query)
                ->queryAll();
        }

        if ($pageurl == $inboxurl) {
            $delmails = new Inbox();
            $delmails->delMail($ids);
        }
    }
}