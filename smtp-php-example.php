<?php
require 'vendor/autoload.php';
require_once 'config/config.inc';

$sendgrid_username = $config['SENDGRID_USERNAME'];
$sendgrid_password = $config['SENDGRID_PASSWORD'];
$to = $config['TO'];

$transport = Swift_SmtpTransport::newInstance('smtp.sendgrid.net', 587);
$transport->setUsername($sendgrid_username);
$transport->setPassword($sendgrid_password);

$mailer = Swift_Mailer::newInstance($transport);

$message = new Swift_Message();
$message->setTo($to);
$message->setFrom($to);
$message->setSubject("[smtp-php-example] Owl named %yourname%");
$message->setBody("%how% are you doing?");

$header = new Smtpapi\Header();
$header->addSubstitution("%yourname%", ["Mr. Owl"]);
$header->addSubstitution("%how%", ["Owl"]);

$message_headers = $message->getHeaders();
$message_headers->addTextHeader("x-smtpapi", $header->jsonString());

try {
  $response = $mailer->send($message);
  print_r($response);
}
catch (\Swift_TransportException $e) {
  print_r($e);
  print_r('Bad username / password');
}
