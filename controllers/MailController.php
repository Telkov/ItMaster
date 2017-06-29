<?php

namespace app\controllers;

use app\models\DeleteId;
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
    public function actionSent()
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
        $sentmsg = Sent::find()->asArray()->all(); //выборка в масив
        $countsentmsg = Sent::find()->asArray()->count(); //выгрузка кол-ва записей
        return $this->render('sent', ['mail' => $mail, 'sentmsg' => $sentmsg, 'countsentmsg'=> $countsentmsg]);
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
}