<?php


namespace app\models;
use yii\base\Model;


class Inbox extends Model
{
    public $allmails;

    public function getMail($hostname, $username, $password)
    {
        $inbox = imap_open($hostname, $username, $password) or die('Cannot connect to gmail: ' . imap_last_error());
        $headers = imap_headers($inbox) or die('Could not get emails');
        $numEmails = sizeof($headers);
        echo "You have $numEmails in your mailbox <br>";
        for ($i = 1; $i < $numEmails + 1; $i++) {
            $mailHeader = imap_headerinfo($inbox, $i);
            $from = iconv_mime_decode($mailHeader->fromaddress, 0, "UTF-8");  //Перекодируем в нужный формат
            $subject = iconv_mime_decode(strip_tags($mailHeader->subject), 0, "UTF-8");   // Перекодируем в нужный формат
            $date = date('d.m.Y H:i', strtotime($mailHeader->date));  //Перекодируем в нужный формат
            $body = imap_body($inbox, $i, 2);
            if($part->encoding == 3) {
                $body = imap_base64($body);
            } else if($part->encoding == 1) {
                $body = imap_8bit($body);
            } else {
                $body = imap_qprint($body);
            }
            debug($body);
            $allmails[] = array('id' => $i, 'from' => $from, 'subject' => $subject, 'date' => $date, 'body' => $body);
        }

        imap_close($inbox);
        return $allmails;
    }
}