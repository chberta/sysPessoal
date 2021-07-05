<?php

namespace App\Http;


class Response{

    //codigo de status http
    private $httpCode = 200;

    // cabeçalho do Response
    private $headers =[];

    // tipo de Conteudo que esta sendo retornado
    private $contentType= 'text/html';

    // Conteudo do Response
    private $content;

    public function __construct($httpCode, $content, $contentType = 'text/html'){
        $this->httpCode = $httpCode;
        $this->content = $content;
        $this->setContenType($contentType);
    }

    public function setContenType($contentType){
        $this->contentType = $contentType;
        $this->addHeader('Content-Type', $contentType);
    }

    public function addHeader($key, $value){
       $this->headers[$key] = $value;
    }

    // responsavel por envia os headers para o navegador.
    private function sendHeaders(){
        http_response_code($this->httpCode);

        foreach ($this->headers as $key=>$value){
            header($key.': '.$value);
        }
    }

    public function sendResponse(){
         // envia os headers
        $this->sendHeaders();

        // imprime o conteudo.
        switch ($this->contentType){
            case 'text/html':
                echo $this->content;
                exit;

        }
    }

}
