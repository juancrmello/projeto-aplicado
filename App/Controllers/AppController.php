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

    public function quemFavoritar(){
        
        $this->validaAutenticacao();

        $pesquisarPor = isset($_GET['pesquisarPor']) ? $_GET['pesquisarPor'] : '';

        $usuarios = array();

        if($pesquisarPor != '') {

            $usuario = Container::getModel('Usuario');
            $usuario->__set('nome', $pesquisarPor);
            $usuario->__set('id', $_SESSION['id']);
            $usuarios = $usuario->getAll();
        }

        $this->view->usuarios = $usuarios;

        $this->render('quemFavoritar');
    }

    public function acao(){

        $this->validaAutenticacao();

        $acao = isset($_GET['acao']) ? $_GET['acao'] : "";
        $id_usuario_favorito = isset($_GET['id_usuario']) ? $_GET['id_usuario'] : '';

        $usuario = Container::getModel('Usuario');
        $usuario->__set('id', $_SESSION['id']);

        if($acao == 'favoritar') {
            $usuario->favoritarUsuario($id_usuario_favorito);
        } else if ($acao == 'deixar_de_favoritar') {
            $usuario->deixarFavoritoUsuario($id_usuario_favorito);
        }

        header('Location: /quem_favoritar');
    }
}


?>