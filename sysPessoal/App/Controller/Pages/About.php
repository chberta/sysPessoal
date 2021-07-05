<?php
namespace App\Controller\Pages;

use \App\Utils\View;
use \App\Model\Entity\Organization;
class About extends Page{

    /** Responsavel por retornar o conteúdo (view) da nossa Home */

    public static function getHome(){

        //Organização
        $obOrganization = new Organization();




        $content = View::render('pages/about',[
                'name'=> $obOrganization->name,
                'description'=> $obOrganization->description,
                'site' => $obOrganization->site
        ]);

        return parent::getPage('Sistema de Gestão Pessoas', $content);    }
}