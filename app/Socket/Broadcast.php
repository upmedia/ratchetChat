<?php

namespace App\Socket;

use App\Events\Event;
use Ratchet\ConnectionInterface;

class Broadcast
{
  /**
   * $event description
   * @var Event
   */
  protected $event;

  /**
   * $clients description
   * @var array
   */
  protected $clients;

  /**
   * [__construct description]
   * @param Event $event   [description]
   * @param array $clients [description]
   */
  public function __construct(Event $event, array $clients)
  {
    $this->event = $event;
    $this->clients = $clients;
  }

  /**
   * [toAll description]
   * @return void
   */
  public function toAll()
  {
    foreach ($this->clients as $client) {
      $client->send($this->event);
    }
  }

  /**
   * @param  ConnectionInterface $clientToExclude
   * @return void
   */
  public function toAllExcept(ConnectionInterface $clientToExclude)
  {
    foreach ($this->clients as $client) {
      if ($client !== $clientToExclude) {
        $client->send($this->event);
      }
    }
  }

  /**
   * @param  ConnectionInterface $client
   * @return void
   */
  public function to(ConnectionInterface $client)
  {
    $client->send($this->event);
  }

}
