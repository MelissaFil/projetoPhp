<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;



Class AdminController extends AbstractController
{

    /**
    * @Route("/admin/agencias")
    */
    public function show()
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
