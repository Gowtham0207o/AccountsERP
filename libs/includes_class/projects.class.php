<?php

class Projects extends DB {

    function create($data){
        return $this->insert("projects",$data);
    }

    function byClient($client){
        return $this->fetchAll("SELECT * FROM projects WHERE client_id=?",[$client]);
    }

}