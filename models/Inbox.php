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
            $from = $mailHeader->fromaddress;
            $subject = strip_tags($mailHeader->subject);
            $date = $mailHeader->date;
            $body = imap_body($inbox, $i);
            $allmails[] = array('idc' => $i, 'from' => $from, 'subject' => $subject, 'date' => $date, 'body' => $body);

        }

        imap_close($inbox);
//        debug($this->allmails);
        return $allmails;
    }
}