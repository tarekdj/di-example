<?php

interface MailerInterface {
    public function send($email, $message);
}
