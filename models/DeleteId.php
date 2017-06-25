<?php
namespace app\models;

use yii\db\ActiveRecord;

class DeleteId extends ActiveRecord
{
    public $id;
    public $query;

    public static function tableName()
    {
        return 'Sent';
    }

    public function deleteMsg($id)
    {
        echo 'this ids = ' . $this->id;
//        $this->query = "DELETE FROM Sent WHERE id in (".$this->id.")";
//        debug($this->query);
//        return $this->query;
//        return Yii::$app->db
//            ->createCommand($query)
//            ->queryAll();
    }
}

//$this->query = "DELETE FROM Sent WHERE id in (" . $this->ids . ")";
//\Yii::$app
//    ->db
//    ->createCommand()
//    ->delete('Sent', ['id => $ids'])
//    ->execute();
//}
//}