<?php

use App\Chat;
use Ratchet\Http\HttpServer;
use Ratchet\Server\IoServer;
use Ratchet\WebSocket\WsServer;

require_once 'vendor/autoload.php';

// Creating Ratchet websocket server
$server = IoServer::factory(
  new HttpServer(
    new WsServer(
      new Chat()
    )
  ),
  8080
);

// Running the server
$server->run();
