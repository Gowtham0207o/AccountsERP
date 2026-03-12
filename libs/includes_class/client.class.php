<?php

class Client extends DB {

    function create($data){
        return $this->insert("clients",$data);
    }

    function all(){
        return $this->fetchAll("SELECT * FROM clients");
    }

}