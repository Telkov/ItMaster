<?php


namespace app\models;
use yii\base\Model;


class Inbox extends Model
{
    public $allmails;
    public $countinboxmsg;

    protected $hostname = '{imap.gmail.com:993/imap/ssl/novalidate-cert}INBOX';
    protected $username = 'mailertest.dev@gmail.com';
    protected $password = 'Test123456';

    public function getMail()
    {
        $inbox = imap_open($this->hostname, $this->username, $this->password) or die('Cannot connect to gmail: ' . imap_last_error());
        $headers = imap_headers($inbox) or die('Could not get emails');
        $numEmails = sizeof($headers);
        //получаем письма
        for ($i = 1; $i < $numEmails + 1; $i++) {

            //разбираем на составляющие
            $mailHeader = imap_headerinfo($inbox, $i);
            $sendermailbox = $mailHeader->sender['0']->mailbox;
            $senderhost = $mailHeader->sender['0']->host;
            $from = $sendermailbox . "@" . $senderhost;
            $subject = iconv_mime_decode(strip_tags($mailHeader->subject), 0, "UTF-8");   // Перекодируем в нужный формат
            $date = date('d.m.Y H:i', strtotime($mailHeader->date));  //Перекодируем в нужный формат
            $msgno = $mailHeader->Msgno;
            $uid = imap_uid($inbox, $msgno);

            //декодируем тело письма
            $sender = $mailHeader->sender;
            $print_sender = $sender[0]->personal;
            $print_check = $print_sender[0]->charset;
            $body = imap_qprint(imap_fetchbody($inbox, $i, 1.2));
            if (empty($body)) {
                $body = imap_qprint(imap_fetchbody($inbox, $i, 1));
            }
            if($print_check == "ISO-8859-9" ) {
                $body = mb_convert_encoding($body, "UTF-8", "ISO-8859-9");
            }

            //формируем массив из нужных нам элементов для последующей обработки
            $allmails[] = array('id' => $i, 'from' => $from, 'subject' => $subject, 'date' => $date, 'body' => $body, 'msgno' => $msgno, 'uid' =>'uid-'.$uid);
        }
        imap_close($inbox);

        return $allmails;
    }

    public function delMail($list)
    {
        $inbox = imap_open($this->hostname, $this->username, $this->password) or die('Cannot connect to gmail: ' . imap_last_error());
        imap_delete($inbox, $list);
        imap_close($inbox);
    }
}