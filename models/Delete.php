<?php
/**
 * Created by PhpStorm.
 * User: Alejandro
 * Date: 24.06.2017
 * Time: 0:11
 */

namespace app\models;


use yii\db\ActiveRecord;

class Delete extends ActiveRecord
{
    public static function tableName()
    {
        return 'Sent';
    }

    public function deleteMessages()
    {
        $query = "DELETE FROM Sent WHERE id in" . $newobj;
        return Yii::$app->db
            ->createCommand($query)
            ->queryAll();
    }
}