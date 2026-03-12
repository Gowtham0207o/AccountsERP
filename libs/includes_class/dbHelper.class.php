<?php

class DB {

    protected $conn;

    public function __construct(){
        $this->conn = database::get_connection();
    }

    protected function insert($table,$data){

        $fields = implode(",",array_keys($data));
        $values = implode(",",array_fill(0,count($data),"?'"));

        $sql="INSERT INTO $table ($fields) VALUES ($values)";
        $stmt=$this->conn->prepare($sql);

        $types=str_repeat("s",count($data));
        $stmt->bind_param($types,...array_values($data));
        $stmt->execute();

        return $this->conn->insert_id;
    }

    protected function fetchAll($sql,$params=[]){

        $stmt=$this->conn->prepare($sql);

        if($params){
            $types=str_repeat("s",count($params));
            $stmt->bind_param($types,...$params);
        }

        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    protected function fetch($sql,$params=[]){

        $stmt=$this->conn->prepare($sql);

        if($params){
            $types=str_repeat("s",count($params));
            $stmt->bind_param($types,...$params);
        }

        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

}