<?php

require_once 'DB.php';

class ItemReceitaDAO {
    
    public function list($id = null) {
        $where = ($id ? "where r.idreceita = $id":"");
        $query = "select r.idreceita, r.nome as receita, ir.quantidade, i.iditem from 
            receita r
            inner join itemreceita ir on r.idreceita = ir.IDRECEITA
            inner join item i on i.iditem = ir.IDITEM $where";
        $conn = DB::getInstancia()->query($query);
        $resultado = $conn->fetchAll();
        return $resultado;
    }
    
    public function insert(ItemReceita $obj) {
        $query = "INSERT INTO itemreceita (IDRECEITA, IDITEM, QUANTIDADE) VALUES (:pidreceita,:piditem,:pquantidade)";
        $conn = DB::getInstancia()->prepare($query);
        $conn->execute(array(':piditem'=>$obj->iditem,
                             ':pidreceita'=>$obj->idreceita,
                             ':pquantidade'=>$obj->quantidade));
        return $conn->rowCount()>0;
    }
    
    public function update(ItemReceita $obj) {
        $query = "UPDATE itemreceita set iditem = :piditem, "
                . "quantidade = :pquantidade "
                . "where idreceita = :pidreceita";
        $conn = DB::getInstancia()->prepare($query);
        $conn->execute(array(':piditem'=>$obj->iditem,
                             ':pidreceita'=>$obj->idreceita,
                             ':pquantidade'=>$obj->quantidade));
        return $conn->rowCount()>0;
    }
    
    public function delete($iditem,$idreceita) {
        $query = "DELETE from itemreceita where "
                . "iditem = :piditem and idreceita = :pidreceita";
        $conn = DB::getInstancia()->prepare($query);
        $conn->execute(array(':piditem'=>$iditem, ':pidreceita'=>$idreceita));
        return $conn->rowcount()>0;
    }
    
}

?>
