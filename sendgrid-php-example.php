<?php
require 'vendor/autoload.php';
require_once 'config/config.inc';

$sendgrid_username = $config['SENDGRID_USERNAME'];
$sendgrid_password = $config['SENDGRID_PASSWORD'];
$to = $config['TO'];

$sendgrid = new SendGrid($sendgrid_username, $sendgrid_password, ["turn_off_ssl_verification" => TRUE]);
$email = new SendGrid\Email();
$email->addTo($to)
  ->setFrom($to)
  ->setSubject('[sendgrid-php-ng-example] Owl named %yourname%')
  ->setText('Owl are you doing?')
  ->setHtml('<strong>%how% are you doing?</strong>')
  ->addSubstitution("%yourname%", ["Mr. Owl"])
  ->addSubstitution("%how%", ["Owl"])
  ->addHeader('X-Sent-Using', 'SendGrid-API')
  ->addHeader('X-Transport', 'web')
  ->addAttachment('./gif.gif', 'owl.gif');

$response = $sendgrid->send($email);
var_dump($response);
