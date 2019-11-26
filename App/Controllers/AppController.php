<?php

namespace App\Controllers;

//os recursos do miniframework
use MF\Controller\Action;
use MF\Model\Container;

class AppController extends Action {

	public function usuario(){
        session_start();

        if($_SESSION['id'] != '' && $_SESSION['nome'] != ''){
        
            $this->render('usuario');
        } else {

            header('Location: /?login=erro');

        }

        
    }

}


?>