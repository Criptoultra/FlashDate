<?php
namespace PH7\FlashDate;

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use PH7\CookieSession\Session\Session;

$oApp->get('/', 'PH7\FlashDate\App\Controller\Main:index');

/*
// Page mod
$oApp->get('/page/{name}', function (Request $oRequest, Response $oResponse, array $aArgs) {
    return $this->view->render($oResponse, 'page.twig', [
        'name' => $aArgs['name']
    ]);
})->setName('page');
*/
