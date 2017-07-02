<?php

namespace app\controllers;
use app\models\Sent;
use Yii;

class LetterController extends AppController
{
    public function actionSent()
    {
        $id = Yii::$app->request->get('id');
        $letter = Sent::find()->asArray()->where(['id'=> $id])->all();
        return $this ->render('letter', compact('letter'));
    }

    public function actionInbox()
    {
//        $id = Yii::$app->request->get('id');
//        $letter = Inbox::find()->asArray()->where(['id'=> $id])->all();
//        return $this ->render('letter', compact('letter'));
    }
}