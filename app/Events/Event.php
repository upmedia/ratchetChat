<?php

namespace App\Events;

abstract class Event
{
  abstract public function eventName();

  abstract public function data();

  /**
   * [__toString description]
   * @return string [description]
   */
  public function __toString()
  {
    return json_encode([
      'event' => $this->eventName(),
      'data' => $this->data(),
    ]);
  }
}
