<?php
namespace app\support;

use PHPMailer\PHPMailer\PHPMailer;

class Email
{
    private array $to = [];
    private string $from;
    private string $template;
    private array $templateData = [];
    private string $message;
    private PHPMailer $mail;

    function __construct()
    {
        //Create an instance; passing `true` enables exceptions
        $this->mail = new PHPMailer(true);
    
        //Server settings
        $this->mail->isSMTP();                                            //Send using SMTP
        $this->mail->Host       = env('EMAIL_HOST');              //Set the SMTP server to send through
        $this->mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $this->mail->Username   = env('EMAIL_USERNAME');                     //SMTP username
        $this->mail->Password   = env('EMAIL_PASSWORD');                               //SMTP password
        $this->mail->Port       = env('EMAIL_PORT');    
    }

    function from(string $from):Email
    {
        $this->from = $from;
        return $this;
    }

    function to():Email
    {
        return $this;
    }

    function template(){}

    function templateData(){}

    function subject():Email
    {
        return $this;
    }

    function message():Email
    {
        return $this;
    }

    function send(){}
}