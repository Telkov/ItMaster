<?php

namespace app\models;

use yii\base\Model;

class Prepare extends Model
{
    public $obj;
    public $newobj;

    public function transform($obj)
    {
        $symbols = array('[', ']','"');
        $newobj = str_replace($symbols, "", $obj);
        return $newobj;
    }
}