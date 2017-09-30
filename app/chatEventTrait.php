<?php

namespace App;

use App\Events\Users;
use App\Events\Message;
use App\Events\UserJoined;
use Ratchet\ConnectionInterface;

trait ChatEventTrait
{
  protected function handleJoined(ConnectionInterface $connection, $payload)
  {
    $user = $this->users[$connection->resourceId] = $payload->data->user;

    $this->broadcast(new Users($this->users))->to($connection);
    $this->broadcast(new UserJoined($user))->toAllExcept($connection);
  }

  protected function handleMessage(ConnectionInterface $connection, $payload)
  {
    $user = $this->users[$connection->resourceId];
    $message = $payload->data;

    $this->broadcast(new Message($user, $message))->toAllExcept($connection);
  }
}
