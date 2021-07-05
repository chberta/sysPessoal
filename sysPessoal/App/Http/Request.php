<?php

namespace App\Http;

class Request{

    // metodo da requisição
    private $httpMethod;

    // uri da pagina
    private $uri;

    // paramentros da URL $_get
    private $queryParams =[];

    // variaveis recebidas no poste da Pagina
    private $postVars=[];

    //cabeçalho da requisição.
    private $headers =[];

    public function __construct()
    {
        $this->queryParams = $_GET ?? [];
        $this->postVars = $_GET ?? [];
        $this->headers = getallheaders();
        $this->httpMethod = $_SERVER['REQUEST_METHOD'] ??'';
        $this->uri = $_SERVER['REQUEST_URI'] ?? '';

    }

    public function getHttpMethod(){
        return $this->httpMethod;
    }

    public function getUri(){
        return $this->uri;
    }

    public function getHeaders(){
        return $this->headers;
    }

    public function getQueryParams(){
        return $this->queryParams;
    }

    public function getPostVars(){
        return $this->postVars;
    }

}
