<?php

namespace App\Controllers;

//os recursos do miniframework
use MF\Controller\Action;
use MF\Model\Container;

class AppController extends Action {

	public function usuario(){
     
        $this->validaAutenticacao();
        
            $comentario = Container::getModel('comentario');

            $comentario->__set('id_usuario', $_SESSION['id']);

            $comentarios = $comentario->getAll();

            $this->view->comentarios = $comentarios;

            $this->render('usuario');

    }

    public function comentario(){
 
        $this->validaAutenticacao(); 
        
            $comentario = Container::getModel('comentario');

            $comentario->__set("comentario", $_POST['comentario']);
            $comentario->__set("id_usuario", $_SESSION['id']);

            $comentario->salvar();

            header('Location: /usuario');

        

    }

    public function validaAutenticacao(){

        session_start();

        if(!isset($_SESSION['id']) || $_SESSION['id'] == '' || !isset($_SESSION['nome']) || ($_SESSION['nome']) == ''){
            header('Location: /?login=erro');
        }
    }
}


?>