<?php

namespace App\Controller;

use App\Entity\GroupParameter;
use App\Form\GroupParameterType;
use App\Repository\GroupParameterRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/group/parameter')]
class GroupParameterController extends AbstractController
{
    #[Route('/', name: 'group_parameter_index', methods: ['GET'])]
    public function index(GroupParameterRepository $groupParameterRepository): Response
    {
        return $this->render('group_parameter/index.html.twig', [
            'group_parameters' => $groupParameterRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'group_parameter_new', methods: ['GET', 'POST'])]
    public function new(Request $request): Response
    {
        $groupParameter = new GroupParameter();
        $form = $this->createForm(GroupParameterType::class, $groupParameter);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($groupParameter);
            $entityManager->flush();

            return $this->redirectToRoute('group_parameter_index');
        }

        return $this->render('group_parameter/new.html.twig', [
            'group_parameter' => $groupParameter,
            'form' => $form->createView(),
        ]);
    }

    #[Route('/{id}', name: 'group_parameter_show', methods: ['GET'])]
    public function show(GroupParameter $groupParameter): Response
    {
        return $this->render('group_parameter/show.html.twig', [
            'group_parameter' => $groupParameter,
        ]);
    }

    #[Route('/{id}/edit', name: 'group_parameter_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, GroupParameter $groupParameter): Response
    {
        $form = $this->createForm(GroupParameterType::class, $groupParameter);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('group_parameter_index');
        }

        return $this->render('group_parameter/edit.html.twig', [
            'group_parameter' => $groupParameter,
            'form' => $form->createView(),
        ]);
    }

    #[Route('/{id}', name: 'group_parameter_delete', methods: ['POST'])]
    public function delete(Request $request, GroupParameter $groupParameter): Response
    {
        if ($this->isCsrfTokenValid('delete'.$groupParameter->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($groupParameter);
            $entityManager->flush();
        }

        return $this->redirectToRoute('group_parameter_index');
    }
}
