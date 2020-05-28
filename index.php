<?php
require('Mailer.php');

class Article {
  protected $title;
  protected $body;

  public function __construct($title, $body) {
    $this->title = $title;
    $this->body = $body;
  }

  public function notifyAdmin() {
    $mailer = new Mailer();
    $mailer->send('admin@mywebsite.site', 'Post has been saved!');
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

    $mailer = new Mailer();
    // Send the activation link
    $mailer->send($email, $activation_link);
  }
}

class MailingList {
  protected $list;
  protected $mailer;
  protected $message;

  public function __construct($list, $message) {
    $this->list = $list;
    $this->message = $message;
    $this->mailer = new Mailer;
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