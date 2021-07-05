<?php

require_once 'vendor/autoload.php';
//$uf = new \App\Model\Uf();

$tipoend = new \App\Model\Tipoend();

//$tipoend->setTipoend_desc('correspondencia');
//$tipoenddao->create($tipoend);
//$tipoenddao->read();

$tipoenddao = new \App\Model\TipoendDao();
//foreach ($ufDao->readwhere( "uf_desc like '%o%'","") as $ufDao ):

foreach ($tipoenddao->readwhere("tipoend_desc like '%a%'","") as $tipoenddao):
    echo '<br> ID '.$tipoenddao['id'].' Desc '. $tipoenddao['tipoend_desc'].' Status '. $tipoenddao['status']. ' <br><hr>';
endforeach;


/*
foreach ($tipoenddao->read() as $tipoenddao):
     echo $tipoenddao['tipoend_desc'].' <br><hr>';
    endforeach;
*/


/**
var_dump($tpend);

 * $ufDao = new \App\Model\UfDao();
 *
$ufDao->create($uf);
 *
$ufDao = new \App\Model\UfDao();
$ufDao->create($uf);
 */