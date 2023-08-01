<?php
namespace app\support;

use Exception;
use PHPMailer\PHPMailer\PHPMailer;

class Email
{
    private string|array $to;
    private string $from;
    private string $fromName;
    private string $template = '';
    private array $templateData = [];
    private string $message;
    private PHPMailer $mail;
    // private $subject;

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

    function from(string $from, string $name = ''):Email
    {
        $this->from = $from;

        $this->fromName = $name;

        return $this;
    }

    function to(string|array $to):Email
    {
        $this->to = $to;

        return $this;
    }

    function template(string $template, array $templateData):Email
    {
        $this->template = $template;
        $this->templateData = $templateData;

        return $this;
    }

    function templateData(){}

    function subject(string $subject):Email
    {
        $this->subject = $subject;

        return $this;
    }

    function message(string $message):Email
    {
        $this->message = $message;
        
        return $this;
    }

    private function addAddress()
    {
        if(is_array($this->to)) {
            foreach ($this->to as $to) {
                $this->mail->addAddress($to);
            }
        }

        if(is_string($this->to)) {
            $this->mail->addAddress($this->to);
        }
    }

    private function sendWithTemplate()
    {
        $file = __DIR__ . '/../views/emails/' . $this->template . '.html';

        if(!file_exists($file)) {
            throw new Exception("O template {$this->template} não existe");
        }

        //$template contém o conteúdo html do template de email
        $template = file_get_contents($file);

        $this->templateData['message'] = $this->message;

        //aqui eu crio um array contendo chave já com o @ e o nome da propriedade para ser substituída
        foreach ($this->templateData as $key => $data  ) {
            $dataTemplate["@{$key}"] = $data;
        }

        //retorno o array substituído na linha de baixo. Agora com o conteúdo das variáveis
        return str_replace(array_keys($dataTemplate), array_values($dataTemplate), $template);
    }

    function send()
    {
        //Recipients
        $this->mail->setFrom($this->from, $this->fromName);

        $this->addAddress();

        //Content
        $this->mail->isHTML(true);
        $this->mail->CharSet = 'UTF-8';                                  //Set email format to HTML
        $this->mail->Subject = $this->subject;
        $this->mail->Body    = empty($this->template) ? $this->message : $this->sendWithTemplate();
        $this->mail->AltBody = $this->message;

        return $this->mail->send();
    }
}