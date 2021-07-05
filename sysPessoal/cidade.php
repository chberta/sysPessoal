<?php

require_once 'vendor/autoload.php';

$cidade = new \App\Model\Cidade();

$cidade->setCidade_desc('Ourinhos');
$cidade->setTab_uf_id(5);
$cidade->setStatus(0);
$cidade->setId(4);

$cidadedao = new \App\Model\CidadeDao();

/** Update */

echo '<br>';

/** Cadastra */
//$cidadedao->create($cidade);

/** Update */
//$cidadedao->update($cidade);

/** Delete Não */
//$cidadedao->delete(4,0);

/** lista todos tabela */

foreach ($cidadedao->read() as $cidadedao):
    echo 'ID: '.$cidadedao['id'].' - Cidade: '. $cidadedao['cidade_desc'].' - Status '. $cidadedao['status'].' UF:'. $cidadedao['tab_uf_id'].' <br><hr>';
endforeach;


/** lista todos com condição na tabela */
/**
foreach ($cidadedao->readwhere("cidade_desc like '%o%'", "" ) as $cidadedao):
    echo '<br>ID: '.$cidadedao['id'].' - Cidade: '. $cidadedao['cidade_desc'].' - Status '. $cidadedao['status'].' UF:'. $cidadedao['tab_uf_id'].' <br><hr>';
endforeach;
*/

/** lista todos com condição e chave estrangeira */
/**
foreach ($cidadedao->readwhere("cidade_desc like '%o%'", "left join tab_uf on (tab_uf_id = tab_uf.id)" ) as $cidadedao):
    echo '<br>ID: '.$cidadedao['id'].' - Cidade: '. $cidadedao['cidade_desc'].' - Status '. $cidadedao['status'].' UF:'. $cidadedao['tab_uf_id'].' -'. $cidadedao['uf_desc'].' <br><hr>';
endforeach;
*/



