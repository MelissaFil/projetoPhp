<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;



Class AgenciasController extends AbstractController
{
    /**
    * @Route("/", name="app_home_page")
    */
    public function homepage()
    {
        return $this->render('agencias/homepage.html.twig') ;
    }
    /**
    * @Route("/agencia/{id_agencia}")
    */
    public function show($id_agencia)
    {
        $agencias = [
            'Central',
            'Barrocas',
            'Alto de são manoel'
        ];

        return $this->render('agencias/lista.html.twig',
        ['agencias'=>$agencias]);
    }

    
}
