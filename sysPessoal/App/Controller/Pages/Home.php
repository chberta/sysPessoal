<?php
namespace App\Controller\Pages;

use \App\Utils\View;
use \App\Model\Entity\Organization;
class Home extends Page{

    /** Responsavel por retornar o conteúdo (view) da nossa Home */

    public static function getHome(){

        //Organização
        $obOrganization = new Organization();




        $content = View::render('pages/home',[
                'name'=> $obOrganization->name
        ]);

        return parent::getPage('Sistema de Gestão Pessoas', $content);    }
}