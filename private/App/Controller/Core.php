<?php
namespace PH7\FlashDate\App\Controller;

use Slim\App;
use Symfony\Component\Yaml\Parser;
use Slim\Views\TwigExtension;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;
use PH7\CookieSession\Session\Session;

class Core extends App
{
	protected $oView;
	
    public function __construct() 
    {
		parent::__construct();

		$aGeneral = (new Parser)->parse(file_get_contents(PH7_PRIVATE_PATH . 'config/general.yml'))['general'];

		// Twig Config
		$this->oView = new \Slim\Views\Twig(PH7_ROOT_PATH . 'theme/' . $aGeneral['theme'], 
		    [
            'cache' => PH7_PRIVATE_PATH . 'cache',
            'debug' => ($aGeneral['environment'] == 'development'),
            'auto_reload' => true
            ]
        );
        $this->oView->addExtension(new TwigExtension($this->getContainer()['router'], $this->getContainer()['request']->getUri()));
	}
}
