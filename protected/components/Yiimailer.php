<?php

/**
 * yiimailer helper class for simple send email without including files.
 *
 * @author tvitcom
 */
class Yiimailer {
       
    public static function mailing($email,$name,$subject,$body)
    {
        $name='=?UTF-8?B?'.base64_encode($name).'?=';
        $subject='=?UTF-8?B?'.base64_encode($subject).'?=';
        $headers="From: $name <{$email}>\r\n".
        "Reply-To: {$email}\r\n".
        "MIME-Version: 1.0\r\n".
        "Content-Type: text/plain; charset=UTF-8";

        mail(Yii::app()->params['CompanyEmail'],$subject,$body,$headers);
    }
}
