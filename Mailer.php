<?php

class Mailer {
  public function send($email, $message) {
    echo "Message '$message' has been sent to '$email' \n";
    sleep(1);
  }
}
