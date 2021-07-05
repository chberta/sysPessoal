<?php


require_once 'vendor/autoload.php';

$testedao = new \App\Dao\TesteDao();
$bairro = new \App\Model\Bairro();

$bairro->setId(2);
$bairro->setBairro_desc('Centro');
$bairro->setStatus(1);
$bairro->setTab_cidade_id(3);

//var_dump($bairro);
$bairrodao = new \App\Model\BairroDao();

echo '<br>';

/** Cadastra */
//$bairrodao->create($bairro);
echo '<br>';
/** Update */
//$bairrodao->update($bairro);

/** Delete Não */
//$bairrodao->delete(2,0);

/** lista todos tabela */
/**
foreach ($bairrodao->read() as $bairrodao):
    echo 'ID: '.$bairrodao['id'].' - Bairro: '. $bairrodao['bairro_desc'].' - Status '. $bairrodao['status'].' Cidade_id:'. $bairrodao['tab_cidade_id'].' <br><hr>';
endforeach;
*/

/** lista todos com condição na tabela */

foreach ($bairrodao->readwhere("bairro_desc like '%o%'", "left join tab_cidade on (tab_cidade_id = tab_cidade.id) left join tab_uf on (tab_uf_id = tab_uf.id) " ) as $bairrodao):
    echo 'ID: '.$bairrodao['id'].' - Bairro: '. $bairrodao['bairro_desc'].' - Status '. $bairrodao['status'].' Cidade_id:'. $bairrodao['tab_cidade_id'].' Cidade:'. $bairrodao['cidade_desc'].'  UF:'. $bairrodao['uf_desc'].' <br><hr>';
endforeach;


/** lista todos com condição e chave estrangeira */
/**
foreach ($cidadedao->readwhere("cidade_desc like '%o%'", "left join tab_uf on (tab_uf_id = tab_uf.id)" ) as $cidadedao):
    echo '<br>ID: '.$cidadedao['id'].' - Cidade: '. $cidadedao['cidade_desc'].' - Status '. $cidadedao['status'].' UF:'. $cidadedao['tab_uf_id'].' -'. $cidadedao['uf_desc'].' <br><hr>';
endforeach;
*/



