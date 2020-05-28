<?php

require 'MailerInterface.php';

class Mailer implements MailerInterface {
  public function send($email, $message) {
    echo "Message '$message' has been sent to '$email' \n";
    sleep(1);
  }
}
