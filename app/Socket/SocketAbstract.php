<?php

namespace App\Socket;

use App\Events\Event;
use App\Socket\Broadcast;

abstract class SocketAbstract
{
  /**
   * @param  Event  $event
   * @return [type]        [description]
   */
  protected function broadcast(Event $event)
  {
    return new Broadcast($event, $this->clients);
  }
}
