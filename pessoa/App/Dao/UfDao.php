<?php

namespace App\Dao;

class UfDao{

    public function create(Uf $p)
    {
        $sql = 'INSERT INTO tab_uf(uf_desc, status ) VALUES (:uf_desc, :status)';
        $stmt = Conexao::getConn()->prepare($sql);


        $stmt->bindParam(":uf_desc", $p->getUf_desc());
        $stmt->bindParam(":status", $p->getStatus());
        $stmt->execute();

    }


}