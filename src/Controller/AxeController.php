<?php

namespace App\Controller;

use App\Entity\Axe;
use App\Form\AxeType;
use App\Repository\AxeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/axe")
 */
class AxeController extends AbstractController
{
    /**
     * @Route("/", name="axe_index", methods={"GET"})
     */
    public function index(AxeRepository $axeRepository): Response
    {
        return $this->render('axe/index.html.twig', [
            'axes' => $axeRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="axe_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $axe = new Axe();
        $form = $this->createForm(AxeType::class, $axe);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($axe);
            $entityManager->flush();

            return $this->redirectToRoute('axe_index');
        }

        return $this->render('axe/new.html.twig', [
            'axe' => $axe,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="axe_show", methods={"GET"})
     */
    public function show(Axe $axe): Response
    {
        return $this->render('axe/show.html.twig', [
            'axe' => $axe,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="axe_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Axe $axe): Response
    {
        $form = $this->createForm(AxeType::class, $axe);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('axe_index');
        }

        return $this->render('axe/edit.html.twig', [
            'axe' => $axe,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="axe_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Axe $axe): Response
    {
        if ($this->isCsrfTokenValid('delete'.$axe->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($axe);
            $entityManager->flush();
        }

        return $this->redirectToRoute('axe_index');
    }
}
