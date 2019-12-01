<?php

namespace App;

use MF\Init\Bootstrap;

class Route extends Bootstrap {

	protected function initRoutes() {

		$routes['home'] = array(
			'route' => '/',
			'controller' => 'indexController',
			'action' => 'index'
		);

		$routes['inscreverse'] = array(
			'route' => '/inscreverse',
			'controller' => 'indexController',
			'action' => 'inscreverse'
		);

		$routes['registrar'] = array(
			'route' => '/registrar',
			'controller' => 'indexController',
			'action' => 'registrar'
		);

		$routes['autenticar'] = array(
			'route' => '/autenticar',
			'controller' => 'AuthController',
			'action' => 'autenticar'
		);

		$routes['usuario'] = array(
			'route' => '/usuario',
			'controller' => 'AppController',
			'action' => 'usuario'
		);

		$routes['sair'] = array(
			'route' => '/sair',
			'controller' => 'AuthController',
			'action' => 'sair'
		);

		$routes['comentario'] = array(
			'route' => '/comentario',
			'controller' => 'AppController',
			'action' => 'comentario'
		);

		$routes['quem_favoritar'] = array(
			'route' => '/quem_favoritar',
			'controller' => 'AppController',
			'action' => 'quemFavoritar'
		);

		$this->setRoutes($routes);
	}

}

?>