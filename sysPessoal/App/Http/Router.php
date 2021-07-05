<?php

namespace App\Http;
use \Closure;
use \Exception;

class Router{

    // raiz do projeto
    private $url ='';
    private $prefix = '';
    // indice de rotas
    private $routes = [];
    //Instancia de Request
    private  $request;

    public function __construct($url){

        $this->request = new Request();
        $this->url = $url;
        $this->setPrefix();

    }

    private function setPrefix(){
        $parseUrl = parse_url($this->url);
        $this->prefix= $parseUrl['path'] ??'';
    }

    private function addRouter($method, $route,$params=[]){

        //validar parametros
        foreach ($params as $key=>$value){
            if($value instanceof Closure){
                $params['controller'] = $value;
                unset($params[$key]);
                continue;
            }
        }

        //variaveis da rota
        $params['variables'] =[];
        // padrão das validação das variaveis rotas
        $patternVariable = '/{(.*?)}/';
        if(preg_match_all($patternVariable,$route, $matches)){
            $route = preg_replace($patternVariable,'(.*?)',$route);


        }


        // Padrão de Validação da URL
        $patternRoute = '/^'.str_replace('/','\/', $route).'$/';

        echo "<pre>";
        print_r($patternRoute);
        echo"</pre>";exit;
        
        // adiciona a rota dentro da classe
        $this->routes[$patternRoute][$method] = $params;

    }TF

    public function get($route,$params=[]){
        return $this->addRouter('GET',$route,$params);

    }

    public function post($route,$params=[]){
        return $this->addRouter('POST',$route,$params);

    }

    public function put($route,$params=[]){
        return $this->addRouter('PUT',$route,$params);

    }

    public function delete($route,$params=[]){
        return $this->addRouter('DELETE',$route,$params);

    }

    // retorna a URI desconsiderando o prefixo
    private function getUri(){
        // uri da request
        $uri= $this->request->getUri();
        // fatia a URI com prefixo
        $xUri = strlen($this->prefix) ? explode($this->prefix,$uri) : [$uri];
        // retorna URI sem Prefixo
        return end($xUri);
    }

    // retorna os dados da rota
    private function getRoute(){
        // retorna URL
        $uri = $this->geturi();
        // Metodo
        $httpMethod = $this->request->getHttpMethod();
        // Valida as Rotas
        foreach ($this->routes as $patternRoute=>$methods){
            //Verifica a URI
           if(preg_match($patternRoute, $uri)){
               // verifica metodo
               if($methods[$httpMethod]){
                   // retorno dos parametros da rota
                   return $methods[$httpMethod];
               }
               // Metodo não permitido
               throw new Exception("Método não é Permitido",405);
           }
        }
        //URL não encontrada
        throw new Exception("URL não encontrada",404);

    }

    // responsavel por executar a rota atual
    public function run(){

        try{
            $route = $this->getRoute();

            //verifica controlador
            if(!isset($route['controller'])){
                throw new Exception("Url Não pode ser Processada",500);
            }

            $args =[];
            return call_user_func_array($route['controller'],$args);




        }catch(Exception $e){
            return new Response($e->getCode(),$e->getMessage());

        }

    }

}