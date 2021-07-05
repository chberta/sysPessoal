<?php
namespace App\Controller\Pages;

use \App\Utils\View;
class Page{

       // Metoido responsavel por rederizar o Topo da Pagina
    public static function getHeader(){
        return View::render('pages/header');
    }


    // Metoido responsavel por rederizar o Rodapé da Pagina
    public static function getFooter(){
        return View::render('pages/footer');
    }

    /** Responsavel por retornar o conteúdo (view) da nossa Home */

    public static function getPage($title, $content){
        return View::render('pages/page', [
            'title' => $title,
            'header' => self::getHeader(),
            'content' => $content,
            'footer' => self::getFooter()
        ]);


    }
}