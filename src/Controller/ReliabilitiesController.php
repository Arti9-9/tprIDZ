<?php

namespace App\Controller;

use App\Entity\Reliabilities;
use App\Form\ReliabilitiesType;
use App\Repository\ReliabilitiesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/reliabilities')]
class ReliabilitiesController extends AbstractController
{
    #[Route('/', name: 'reliabilities_index', methods: ['GET'])]
    public function index(ReliabilitiesRepository $reliabilitiesRepository): Response
    {
        return $this->render('reliabilities/index.html.twig', [
            'reliabilities' => $reliabilitiesRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'reliabilities_new', methods: ['GET', 'POST'])]
    public function new(Request $request): Response
    {
        $reliability = new Reliabilities();
        $form = $this->createForm(ReliabilitiesType::class, $reliability);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($reliability);
            $entityManager->flush();

            return $this->redirectToRoute('reliabilities_index');
        }

        return $this->render('reliabilities/new.html.twig', [
            'reliability' => $reliability,
            'form' => $form->createView(),
        ]);
    }

    #[Route('/{id}', name: 'reliabilities_show', methods: ['GET'])]
    public function show(Reliabilities $reliability): Response
    {
        return $this->render('reliabilities/show.html.twig', [
            'reliability' => $reliability,
        ]);
    }

    #[Route('/{id}/edit', name: 'reliabilities_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Reliabilities $reliability): Response
    {
        $form = $this->createForm(ReliabilitiesType::class, $reliability);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('reliabilities_index');
        }

        return $this->render('reliabilities/edit.html.twig', [
            'reliability' => $reliability,
            'form' => $form->createView(),
        ]);
    }

    #[Route('/{id}', name: 'reliabilities_delete', methods: ['POST'])]
    public function delete(Request $request, Reliabilities $reliability): Response
    {
        if ($this->isCsrfTokenValid('delete'.$reliability->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($reliability);
            $entityManager->flush();
        }

        return $this->redirectToRoute('reliabilities_index');
    }
}
