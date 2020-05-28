<?php
require('MailerWrapper.php');

class Article {
  protected $title;
  protected $body;
  protected $mailer;

  public function __construct($title, $body, MailerInterface $mailer) {
    $this->title = $title;
    $this->body = $body;
    $this->mailer = $mailer;
  }

  public function notifyAdmin() {
    $this->mailer->send('admin@mywebsite.site', 'Post has been saved!');
  }

  public function save() {
    // Logic to save the post.
    // ...
    
    // Notify the administrator.
    $this->notifyAdmin();
  }
}

class User {
  protected $mailer;

  public function __construct(MailerInterface $mailer) {
    $this->mailer = $mailer;
  }

  public function register($email, $password) {
    // Logic to save the user
    // ...

    $activation_link = 'activation link';

    // Send the activation link
    $this->mailer->send($email, $activation_link);
  }
}

class MailingList {
  protected $list;
  protected $mailer;
  protected $message;

  public function __construct($list, $message, MailerInterface $mailer) {
    $this->list = $list;
    $this->message = $message;
    $this->mailer = $mailer;
  }

  public function process() {
    foreach($this->list as $email) {
      $this->mailer->send($email, $this->message);
    }
  }
}

/**
 * MAIN PROGRAM
 */
// Init the mailer.
$mailer = new MailerWrapper();

// Process the mailing list.
$list = [
  'user1@example.site',
  'user2@example.site',
  'user3@example.site',
];

$message = 'Hi! This is my message';
$ml = new MailingList($list, $message, $mailer);
$ml->process();

// Save a new article.
$my_post = new Article('title', 'hello world', $mailer);
$my_post->save();

// Send activation link.
$user = new User($mailer);
$user->register('user@example.site', 'MY_PASSWORD');