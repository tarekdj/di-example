<?php

final class MailerPro {
  protected $message;

  public function sendEmail($email) {
    $message = $this->message;
    echo "Message '$message' has been sent to '$email' \n";
    sleep(1);
  }

  public function setMessage($message) {
    $this->message = $message;
  }
}