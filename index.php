<?php
require('MailerPro.php');

class Article {
  protected $title;
  protected $body;

  public function __construct($title, $body) {
    $this->title = $title;
    $this->body = $body;
  }

  public function notifyAdmin() {
    $mailer = new MailerPro();
    $mailer->setMessage('Post has been saved!');
    $mailer->sendEmail('admin@mywebsite.site');
  }

  public function save() {
    // Logic to save the post.
    // ...
    
    // Notify the administrator.
    $this->notifyAdmin();
  }
}

class User {
  public function register($email, $password) {
    // Logic to save the user
    // ...

    $activation_link = 'activation link';

    $mailer = new MailerPro();
    $mailer->setMessage($activation_link);
    // Send the activation link
    $mailer->sendEmail($email);
  }
}

class MailingList {
  protected $list;
  protected $mailer;
  protected $message;

  public function __construct($list, $message) {
    $this->list = $list;
    $this->message = $message;
    $this->mailer = new MailerPro();
  }

  public function process() {
    $this->mailer->setMessage($this->message);
    foreach($this->list as $email) {
      $this->mailer->sendEmail($email);
    }
  }
}

/**
 * MAIN PROGRAM
 */

// Process the mailing list.
$list = [
  'user1@example.site',
  'user2@example.site',
  'user3@example.site',
];

$message = 'Hi! This is my message';
$ml = new MailingList($list, $message);
$ml->process();

// Save a new article.
$my_post = new Article('title', 'hello world');
$my_post->save();

// Send activation link.
$user = new User();
$user->register('user@example.site', 'MY_PASSWORD');