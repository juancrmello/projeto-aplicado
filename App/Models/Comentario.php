<?php

    namespace App\Models;

    use MF\Model\Model;

    class Comentario extends Model {
        
        private $id;
        private $id_usuario;
        private $comentario;
        private $data;

        public function __get($atributo){
            return $this->$atributo;
        }

        public function __set($atributo, $valor){
            $this->$atributo = $valor;
        }

        public function salvar(){

            $query = "insert into comentarios(id_usuario, comentario)values(:id_usuario, :comentario)";
            
            $stmt = $this->db->prepare($query);
            $stmt->bindValue(':id_usuario', $this->__get('id_usuario'));
            $stmt->bindValue(':comentario', $this->__get('comentario'));
            $stmt->execute();

            return $this;
        }

        public function getAll(){

            $query = "select c.id, c.id_usuario, u.nome, c.comentario, DATE_FORMAT(c.data, '%d/%m/%Y %H:%i') as data from comentarios as c left join usuarios as u on(c.id_usuario = u.id) where c.id_usuario = :id_usuario order by c.data desc";

            $stmt = $this->db->prepare($query);
            $stmt->bindValue(':id_usuario', $this->__get('id_usuario'));
            $stmt->execute();

            return $stmt->fetchAll(\PDO::FETCH_ASSOC);

        }
    }    