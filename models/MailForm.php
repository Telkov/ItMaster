<?php
/**
 * Created by PhpStorm.
 * User: Alejandro
 * Date: 19.06.2017
 * Time: 22:18
 */

namespace app\models;


use yii\base\Model;

class MailForm extends Model
{
    public $email;
    public $subject;
    public $message;
}