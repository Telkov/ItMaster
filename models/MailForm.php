<?php


namespace app\models;


//use yii\base\Model;
use yii\db\ActiveRecord;

class MailForm extends ActiveRecord
{

     public static function tableName()
     {
         return 'Sent';
     }

    public function attributeLabels()
    {
        return [
            'recipient' => 'Email получателя',
            'subject' => 'Тема сообщения',
            'message' => 'Текст сообщения'
        ];
    }

    public function rules()
    {
    	return [
    		['recipient', 'required', 'message' => 'Поле Email обязательно для заполнения!'],
    		['recipient', 'email'],
            ['subject', 'trim'],
            ['message', 'trim'],
    	];
    }

}

