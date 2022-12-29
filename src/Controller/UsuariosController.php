<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

Class UsuariosController extends AbstractController{
    /**
     * @Route("/agencia/{nome}/usuarios")
     */
    public function adicionar()
    {
        $numUsuarios = rand(10, 20);
        return $this->json(['quantidadeUsuarios' => $numUsuarios]);
    }
}