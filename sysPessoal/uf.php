<?php

require_once 'vendor/autoload.php';
/**
$uf = new \App\Model\Uf();
$uf->setUf_desc('Rio Grande do Sul');
$uf->setStatus(0);
*/


/** Cadastro */
//$ufDao->create($uf);

/** UPDATE */

$uf = new \App\Model\Uf();
$uf->setId(4);
$uf->setUf_desc('Minass Gerais');
$uf->setStatus(1);

$ufDao = new \App\Model\UfDao();

//$ufDao->delete(5,0);

//$ufDao->readwhere( "id=5");

//$ufDao->update($uf);
/** Pesquisa */
//$ufDao->read();

foreach ($ufDao->readwhere( "uf_desc like '%o%'","") as $ufDao ):
    echo 'ID: '.$ufDao['id']. ' UF: '.$ufDao['uf_desc']. '- status: '. $ufDao['status'].' <br><hr>';
endforeach;

