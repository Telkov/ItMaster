<?php

namespace app\models;

use yii\base\Model;

class Prepare extends Model
{
    public $obj;
    public $newobj;
    public $symbols;
    public $newarr;

    public function transform($obj)
    {
        $this->symbols = array('[', ']','"');
        $this->newobj = str_replace($this->symbols, "", $obj);
//        $this->newarr = explode(",",$this->newobj);
//        debug($this->newarr);
        return $this->newobj;
    }
}