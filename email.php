<?php

if(isset($_POST['email']) && !empty($_POST['email'])){

$nome = addslashes($_POST['name']);
$email = addslashes($_POST['email']);
$mensagem = addslashes($_POST['message']);

$to = "shp4la@tuta.io";
$subject = "Contato - TESTE";
$body = "Nome: ".$nome."\n".
        "Email: ".$email."\n".
        "Mensagem:".$mensagem;
}
$header = "From: mateus@vacariano.br"."\r\n".
            "Reply-to:".$email."\r\n".
            "X=Mailer:PHP/".phpversion();

if(mail($to,$subject,$body,$header)){
    echo("Email enviado com sucesso!");
} else {
    echo("Email não foi enviado!");
}

?>