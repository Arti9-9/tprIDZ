<?php

namespace App\Controller;

use App\Entity\TechicalIndexs;
use App\Form\TechicalIndexsType;
use App\Repository\TechicalIndexsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/techical/indexs')]
class TechicalIndexsController extends AbstractController
{
    #[Route('/', name: 'techical_indexs_index', methods: ['GET'])]
    public function index(TechicalIndexsRepository $techicalIndexsRepository): Response
    {
        return $this->render('techical_indexs/index.html.twig', [
            'techical_indexs' => $techicalIndexsRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'techical_indexs_new', methods: ['GET', 'POST'])]
    public function new(Request $request): Response
    {
        $techicalIndex = new TechicalIndexs();
        $form = $this->createForm(TechicalIndexsType::class, $techicalIndex);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($techicalIndex);
            $entityManager->flush();

            return $this->redirectToRoute('techical_indexs_index');
        }

        return $this->render('techical_indexs/new.html.twig', [
            'techical_index' => $techicalIndex,
            'form' => $form->createView(),
        ]);
    }

    #[Route('/{id}', name: 'techical_indexs_show', methods: ['GET'])]
    public function show(TechicalIndexs $techicalIndex): Response
    {
        return $this->render('techical_indexs/show.html.twig', [
            'techical_index' => $techicalIndex,
        ]);
    }

    #[Route('/{id}/edit', name: 'techical_indexs_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, TechicalIndexs $techicalIndex): Response
    {
        $form = $this->createForm(TechicalIndexsType::class, $techicalIndex);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('techical_indexs_index');
        }

        return $this->render('techical_indexs/edit.html.twig', [
            'techical_index' => $techicalIndex,
            'form' => $form->createView(),
        ]);
    }

    #[Route('/{id}', name: 'techical_indexs_delete', methods: ['POST'])]
    public function delete(Request $request, TechicalIndexs $techicalIndex): Response
    {
        if ($this->isCsrfTokenValid('delete'.$techicalIndex->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($techicalIndex);
            $entityManager->flush();
        }

        return $this->redirectToRoute('techical_indexs_index');
    }
}
