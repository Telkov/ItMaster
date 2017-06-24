<?php
/**
 * Created by PhpStorm.
 * User: Alejandro
 * Date: 19.06.2017
 * Time: 21:42
 */

namespace app\controllers;
use app\models\Delete;
use app\models\Prepare;
use Yii;
use app\models\MailForm;
use yii\web\JsonParser;

// use app\models\Sent;

class MailController extends AppController
{
    //Функционал отправки письма и добавление новых писем в БД
    public function actionNew()
    {
        $mail = new MailForm();
        $mail->date_dep = date("Y-m-d H:i:s");
        if ($mail->load(Yii::$app->request->post())) {
        	if ($mail->save()) {
                Yii::$app->mailer->compose()
                    ->setFrom(['mailertest.dev@gmail.com' => 'ItMAster TEST'])
                    ->setTo($mail->recipient)
                    ->setSubject($mail->subject)
                    ->setTextBody($mail->message)
                    ->send();
        		Yii::$app->session->setFlash('succes', 'Письмо отправлено успешно');
        		return $this->refresh();
        	} else {
        		Yii::$app->session->setFlash('error', 'Произошла ошибка');
        	}
        }
        return $this->render('mailform', compact('mail'));
    }

    //Выборка писем из БД
    public function actionSent()
    {
//        if (Yii::$app->request->isAjax) {
//            $obj = $_POST['jsonObj'];
//        }
        //      $sent = Sent::find()->all(); выборка в объект
        $sent = MailForm::find()->asArray()->all(); //выборка в масив
        $countsent = MailForm::find()->asArray()->count(); //выгрузка кол-ва записей
        return $this->render('sent', compact('sent', 'countsent'));

    }

    //Удаление писем
    public function actionDelete()
    {
        if (Yii::$app->request->isAjax) {
            $obj = $_POST['jsonObj'];
        }
//        $newobj = new Prepare();
//        $newobj = $this->transform();
        $symbols = array('[', ']','"');
        $newobj = str_replace($symbols, "", $obj);
        debug($newobj);
        $del = new Delete();
        return $del->deleteMessages();










//        $del = new Delete();
//        $this->del->deleteMessages();
////        $del = new Delete();
////        $del->deleteMessages();
////            return $this->render('sent', compact('data'));
    }

}