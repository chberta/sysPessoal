<?php
namespace App\Model;

class Uf{

    private $id;
    private $uf_desc;
    private $status;

    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function getUf_desc(){
        return $this->uf_desc;
    }

    public function setUf_desc($uf_desc){
        $this->uf_desc = $uf_desc;
    }

    public function getStatus(){
        return $this->status;
    }

    public function setStatus($status){
        $this->status = $status;
    }
}