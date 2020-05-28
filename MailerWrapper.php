<?php
require 'MailerPro.php';
require 'MailerInterface.php';

class MailerWrapper implements MailerInterface {
  protected $mailer;

  public function __construct() {
    $this->mailer = new MailerPro();
  }

  public function send($email, $message) {
    $this->mailer->setMessage($message);
    $this->mailer->sendEmail($email);
  }
  
}
