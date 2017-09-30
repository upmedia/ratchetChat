<?php

namespace App\Events;

use App\Events\Event;

class Message extends Event
{
  /**
   * $user
   * @var [type]
   */
  protected $user;

  protected $message;

  public function __construct($user, $message)
  {
    $this->user = $user;
    $this->message = $message;
  }

  /**
   * [eventName description]
   * @return [type] [description]
   */
  public function eventName()
  {
    return 'message';
  }

  /**
   * [data description]
   * @return [type] [description]
   */
  public function data()
  {
    $payload = $this->message;
    $payload->user = $this->user;

    return  $payload;
  }
}
