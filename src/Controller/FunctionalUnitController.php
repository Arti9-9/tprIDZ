<?php

namespace App\Controller;

use App\Entity\FunctionalUnit;
use App\Form\FunctionalUnitType;
use App\Repository\FunctionalUnitRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/functional/unit')]
class FunctionalUnitController extends AbstractController
{
    #[Route('/', name: 'functional_unit_index', methods: ['GET'])]
    public function index(FunctionalUnitRepository $functionalUnitRepository): Response
    {
        return $this->render('functional_unit/index.html.twig', [
            'functional_units' => $functionalUnitRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'functional_unit_new', methods: ['GET', 'POST'])]
    public function new(Request $request): Response
    {
        $functionalUnit = new FunctionalUnit();
        $form = $this->createForm(FunctionalUnitType::class, $functionalUnit);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($functionalUnit);
            $entityManager->flush();

            return $this->redirectToRoute('functional_unit_index');
        }

        return $this->render('functional_unit/new.html.twig', [
            'functional_unit' => $functionalUnit,
            'form' => $form->createView(),
        ]);
    }

    #[Route('/{id}', name: 'functional_unit_show', methods: ['GET'])]
    public function show(FunctionalUnit $functionalUnit): Response
    {
        return $this->render('functional_unit/show.html.twig', [
            'functional_unit' => $functionalUnit,
        ]);
    }

    #[Route('/{id}/edit', name: 'functional_unit_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, FunctionalUnit $functionalUnit): Response
    {
        $form = $this->createForm(FunctionalUnitType::class, $functionalUnit);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('functional_unit_index');
        }

        return $this->render('functional_unit/edit.html.twig', [
            'functional_unit' => $functionalUnit,
            'form' => $form->createView(),
        ]);
    }

    #[Route('/{id}', name: 'functional_unit_delete', methods: ['POST'])]
    public function delete(Request $request, FunctionalUnit $functionalUnit): Response
    {
        if ($this->isCsrfTokenValid('delete'.$functionalUnit->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($functionalUnit);
            $entityManager->flush();
        }

        return $this->redirectToRoute('functional_unit_index');
    }
}
