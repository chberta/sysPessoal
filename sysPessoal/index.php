<?php
require __DIR__.'/vendor/autoload.php';


use \App\Http\Router;
use \App\Utils\View;

define('URL','http://localhost/sys/sysPessoal');
// define valor padrão variavel
View::init([
    'URL' => URL
]);

// inicia ROUTER
$obRouter = new Router(URL);

include __DIR__.'/App/Routes/pages.php';

// Imprime o Response da Rota
$obRouter->run()->sendResponse();