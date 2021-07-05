<?php
require_once 'vendor/autoload.php';

$uf = new \App\Model\Uf();

$uf->setUf_desc('MATO GROSSO');
$uf->setStatus(0);


$ufdao = new \App\Dao\UfDao();

$ufdao->create($uf);




/*
include __DIR__.'/includes/header.php';
include __DIR__.'/includes/listagem.php';
include __DIR__.'/includes/footer.php';
*/










