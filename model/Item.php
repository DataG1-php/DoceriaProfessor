<?php
class Item {
    
    private $iditem;
    private $nome;
    private $validade;
    private $valor;
    private $idingredientes;
    
    
    public function __construct() {
    }
    
    public function __get($name) {
        return $this->$name;
    }
    
    public function __set($name, $value) {
        $this->$name = $value;
    }
    
    public function getIditem() {
        return $this->iditem;
    }


}

?>