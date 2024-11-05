<?php

class ItemReceita {
    
    private $iditem;
    private $idreceita;
    private $quantidade;
    
    public function __construct() {
        
    }
    
    public function __set(string $name, $value): void {
        $this->$name = $value;
    }
    
    public function __get(string $name) {
        return $this->$name;
    }
    
}
