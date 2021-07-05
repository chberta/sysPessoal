<?php
use \App\Http\Response;
use \App\Controller\Pages;

// Rota Home Raiz
$obRouter->get('/',[
    function(){
        return new Response(200, Pages\Home::getHome());
    }
]);
// Rota de Sobre
$obRouter->get('/sobre',[
    function(){
        return new Response(200, Pages\About::getHome());
    }
]);

// Rota Dinamica
$obRouter->get('/pagina/{idPagina}/{acao}',[
    function($idPagina,$acao){
        return new Response(200, 'Pagina 10'.$idPagina.' - '.$acao);
    }
]);