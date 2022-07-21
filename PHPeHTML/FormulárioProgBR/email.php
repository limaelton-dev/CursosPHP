<?php

if(isset($_POST['email']) && !empty( $_POST['email'])){ //verifica se existe e se não está vazio

//nessas variáveis abaixo, estou pegando o valor dado no formulário
$nome = addslashes($_POST['name']);
$email = addslashes($_POST['email']);
$mensagem = addslashes($_POST['message']);

$to = "eltonlima.contato@gmail.com"; //para quem 
$subject = "Contato - PROJETO X"; //esse aqui é o assunto do email
$body = "Nome: " . $nome . PHP_EOL .
        "Email: " .$email . PHP_EOL . 
        "Mensagem: " .$mensagem;

$header = "From: testando@gmail.com" . "\r\n" .
          "Reply-To:" . $email . "\r\n" .
          "X=Mailer:PHP/" . phpversion(); //essa função do php retorna qual a versao atual dele

if(mail($to, $subject, $body, $header)){
    echo("Email enviado com sucesso!");
} else{
    echo "O Email não pode ser enviado" ;
}

}
?>