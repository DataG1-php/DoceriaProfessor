<?php

require_once 'DB.php';

class ItemDAO {
    
    public function list($id = null) {
        $where = ($id ? "where it.iditem = $id":"");
        $query = "select it.iditem, it.nome, ig.descricao, 
            it.validade, it.valor, ig.idingredientes from ingredientes ig 
            INNER JOIN item it ON it.idingredientes = 
            ig.idingredientes $where";
        $conn = DB::getInstancia()->query($query);
        $resultado = $conn->fetchAll();
        return $resultado;
    }
    
    public function insert(Item $obj) {
        $query = "INSERT INTO item ("
            . "iditem, nome, validade, valor,"
            . " idingredientes) VALUES (NULL, "
            . ":pnome, :pvalidade, :pvalor, "
            . ":pidingredientes)";
        $conn = DB::getInstancia()->prepare($query);
        $conn->execute(array(':pnome'=>$obj->nome,
                             ':pvalidade'=>$obj->validade,
                             ':pvalor'=>$obj->valor,
                             ':pidingredientes'=>$obj->idingredientes));
        return $conn->rowCount()>0;
    }
    
    public function update(Item $obj) {
        $query = "UPDATE item SET nome = '$obj->nome',"
                . " validade = '$obj->validade', "
                . "valor = $obj->valor, "
                . "idingredientes = $obj->idingredientes "
                . "WHERE iditem = $obj->iditem";
        
        $conn = DB::getInstancia()->prepare($query);
                
        $conn->execute();
                            
        return $conn->rowCount()>0;
    }
    
    public function delete($id) {
        $query = "DELETE from item where iditem = :pid";
        $conn = DB::getInstancia()->prepare($query);
        $conn->execute(array(':pid'=>$id));
        return $conn->rowcount()>0;
    }
    
}

?>
