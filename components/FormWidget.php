<?php

namespace app\components;

use Yii;
use yii\base\Widget;
use app\models\MailForm;

class FormWidget extends Widget
{
    public function run()
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

                Yii::$app->session->setFlash('contactFormSubmitted');
            }
        }

        return $this->render('form', [
            'mail' => $mail,
        ]);
    }
}