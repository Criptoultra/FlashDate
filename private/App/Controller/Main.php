<?php
declare(strict_types=1);

namespace PH7\FlashDate\App\Controller;

use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;
use PH7\CookieSession\Session\Session;

class Main extends Core
{
    public function index(ServerRequestInterface $oRequest, ResponseInterface $oResponse, array $args) : ResponseInterface
    {
      $name =$oRequest->getAttribute('name');
      $oResponse->getBody()->write("Hello Hello, $name");
      return $oResponse;
    }
}
