<?php

require_once 'DB.php';

class ReceitaDAO {
    
    public function list($id = null) {
        $where = ($id ? "where idreceita = $id":'');
        $query = "SELECT * FROM receita $where";
        $conn = DB::getInstancia()->query($query);
        $resultado = $conn->fetchAll();
        return $resultado;
    }
    
    public function insert(Receita $obj) {
        $query = "INSERT INTO receita (idreceita, nome) VALUES (null,:nome)";
        $conn = DB::getInstancia()->prepare($query);
        $conn->execute(array(':nome'=>$obj->nome));
        return $conn->rowCount()>0;
    }
    
    public function update(Receita $obj) {
        $query = "UPDATE receita set nome = :pnome "
                . "where idreceita = :pidreceita";
        $conn = DB::getInstancia()->prepare($query);
        $conn->execute(array(':pnome'=>$obj->nome,
                      ':pidreceita'=>$obj->idreceita));
        return $conn->rowCount()>0;
    }
    
    public function delete($id) {
        $query = "DELETE from receita where idreceita = :pid";
        $conn = DB::getInstancia()->prepare($query);
        $conn->execute(array(':pid'=>$id));
        return $conn->rowcount()>0;
    }
}


?>