<?php

namespace App\Controller;

use App\Entity\Gerentes;
use App\Form\GerentesType;
use App\Repository\GerentesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/gerentes")
 */
class GerentesController extends AbstractController
{
    /**
     * @Route("/", name="app_gerentes_index", methods={"GET", "POST"})
     */
    public function index(Request $request, GerentesRepository $gerentesRepository): Response
    {
        $gerente = new Gerentes();
        $form = $this->createForm(GerentesType::class, $gerente);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $gerentesRepository->add($gerente, true);

            return $this->redirectToRoute('app_gerentes_index', [], Response::HTTP_SEE_OTHER);
        }
        return $this->renderForm('gerentes/index.html.twig', [
            'gerentes' => $gerentesRepository->findAll(),
            'gerente' => $gerente,
            'form' => $form,
        ]);
    }


    /**
     * @Route("/{id}", name="app_gerentes_show", methods={"GET"})
     */
    public function show(Gerentes $gerente): Response
    {
        return $this->render('gerentes/show.html.twig', [
            'gerente' => $gerente,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_gerentes_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Gerentes $gerente, GerentesRepository $gerentesRepository): Response
    {
        $form = $this->createForm(GerentesType::class, $gerente);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $gerentesRepository->add($gerente, true);

            return $this->redirectToRoute('app_gerentes_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('gerentes/edit.html.twig', [
            'gerente' => $gerente,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_gerentes_delete", methods={"POST"})
     */
    public function delete(Request $request, Gerentes $gerente, GerentesRepository $gerentesRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$gerente->getId(), $request->request->get('_token'))) {
            $gerentesRepository->remove($gerente, true);
        }

        return $this->redirectToRoute('app_gerentes_index', [], Response::HTTP_SEE_OTHER);
    }
}
