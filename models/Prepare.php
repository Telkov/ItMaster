<?php
/**
 * Created by PhpStorm.
 * User: Alejandro
 * Date: 25.06.2017
 * Time: 1:36
 */

namespace app\models;


use yii\base\Model;

class Prepare extends Model
{
    public function transform()
    {
        $symbols = array('[', ']','"');
        $newobj = str_replace($symbols, "", $obj);
    }
}