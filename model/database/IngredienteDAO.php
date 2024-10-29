<?php

require_once 'DB.php';

class IngredienteDAO {
    
    public function list($id = null) {
        $where = ($id ? "where idingredientes = $id":'');
        $query = "SELECT * FROM ingredientes $where";
        $conn = DB::getInstancia()->query($query);
        $resultado = $conn->fetchAll();
        return $resultado;
    }
    
    public function insert(Ingrediente $obj) {
        $query = "INSERT INTO ingredientes (idingredientes, descricao) VALUES (null,:descricao)";
        $conn = DB::getInstancia()->prepare($query);
        $conn->execute(array(':descricao'=>$obj->descricao));
        return $conn->rowCount()>0;
    }
    
    public function update(Ingrediente $obj) {
        $query = "UPDATE ingredientes set descricao = :pdescricao "
                . "where idingredientes = :pidingredientes";
        $conn = DB::getInstancia()->prepare($query);
        $conn->execute(array(':pdescricao'=>$obj->descricao,
                      ':pidingredientes'=>$obj->idingredientes));
        return $conn->rowCount()>0;
    }
    
    public function delete($id) {
        $query = "DELETE from ingredientes where idingredientes = :pid";
        $conn = DB::getInstancia()->prepare($query);
        $conn->execute(array(':pid'=>$id));
        return $conn->rowcount()>0;
    }
}
?>