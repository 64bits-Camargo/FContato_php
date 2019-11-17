<?php

if(isset($_POST['email']) && !empty($_POST['email'])){

$nome = addslashes($_POST['name']);
$email = addslashes($_POST['email']);
$mensagem = addslashes($_POST['message']);

$send_file = "Nome: $nome \n\nE-mail: $email\n\nMensagem:\n$mensagem";

require_once('phpmiler/class.phpmailer.php');

define('GUSER', 'martelua0@gmail.com'); // email
define('GPDW', '------');       //senha


function smtpmailer($para, $de, $de_nome, $assunto, $corpo) {

    global $error;

    $mail = new PHPMailer();
	$mail->IsSMTP();		// Ativar SMTP
	$mail->SMTPDebug = 0;		// Debugar: 1 = erros e mensagens, 2 = mensagens apenas
	$mail->SMTPAuth = true;		// Autenticação ativada
	$mail->SMTPSecure = 'ssl';	// SSL REQUERIDO pelo GMail
	$mail->Host = 'smtp.gmail.com';	// SMTP utilizado
	$mail->Port = 587;  		// A porta 587 deverá estar aberta em seu servidor
	$mail->Username = GUSER;
	$mail->Password = GPWD;
	$mail->SetFrom($de, $de_nome);
	$mail->Subject = $assunto;
	$mail->Body = $corpo;
    $mail->AddAddress($para);
    

    if(!$mail->Send()) {
    
        $error = 'Mail error: '.$mail->ErrorInfo; 
		return false;
    
    } else {
    
        $error = 'Mensagem enviada!';
		return true;
    
    }

}

$to = 'martelua0@gmail.com';
$to_name = 'Mateus';
$assunto = 'Teste';

if (smtpmailer($email, $to, $to_name, $assunto, $send_file)) {

    Header("location:http://www.google.com.br"); 
    echo('Email enviado com sucesso!');
    
}

if (!empty($error)) echo $error;

?>