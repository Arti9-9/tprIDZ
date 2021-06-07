<?php


namespace App\Controller;

use App\Entity\Equipment;
use App\Form\EquipmentType;
use App\Repository\EquipmentRepository;
use App\Repository\FunctionalUnitRepository;
use DateTime;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\UX\Chartjs\Builder\ChartBuilderInterface;
use Symfony\UX\Chartjs\Model\Chart;

#[Route('/equipment')]
class EquipmentController extends AbstractController
{
    #[Route('/equipment', name: 'equipment_index', methods: ['GET'])]
    public function index(EquipmentRepository $equipmentRepository): Response
    {
        return $this->render('equipment/index.html.twig', [
            'equipment' => $equipmentRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'equipment_new', methods: ['GET', 'POST'])]
    public function new(Request $request): Response
    {
        $equipment = new Equipment();
        $form = $this->createForm(EquipmentType::class, $equipment);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($equipment);
            $entityManager->flush();

            return $this->redirectToRoute('equipment_index');
        }

        return $this->render('equipment/new.html.twig', [
            'equipment' => $equipment,
            'form' => $form->createView(),
        ]);
    }

    #[Route('/{id}', name: 'equipment_show', methods: ['GET'])]
    public function show(Equipment $equipment, FunctionalUnitRepository $functionalUnit, ChartBuilderInterface $chartBuilder): Response
    {
        $chart = $chartBuilder->createChart(Chart::TYPE_LINE);
        $chartRel = $chartBuilder->createChart(Chart::TYPE_LINE);
        $indexs = $equipment->getTechicalIndexs()->getValues();
        $reliability = $equipment->getReliabilities()->getValues();
        $uniqDate = array();
        $valueGraph = array();
        $valueGraphRel = array();
        foreach ($indexs as $index) {
            $dateTmp = $index->getDate()->format('Y-m-d');
            array_push($valueGraph, $index->getValue());
            array_push($uniqDate, $dateTmp);
        }
        foreach ($reliability as $item) {
            array_push($valueGraphRel,$item->getValue());
        }
        $uniqDate = array_unique($uniqDate);
        $chart->setData([
            'labels' => $uniqDate,
            'datasets' => [
                [
                    'label' => $equipment->getName().' Тех. индект',
                    'backgroundColor' => 'rgb(255, 255, 255)',
                    'borderColor' => 'rgb(255, 99, 132)',
                    'data' => $valueGraph,
                ],
            ],
        ]);
        $chart->setOptions([
            'scales' => [
                'yAxes' => [
                    ['ticks' => ['min' => 0, 'max' => 100]],
                ],
            ],
        ]);
        $chartRel->setData([
            'labels' => $uniqDate,
            'datasets' => [
                [
                    'label' => $equipment->getName().' Pэо',
                    'backgroundColor' => 'rgb(255, 255, 255)',
                    'borderColor' => 'rgb(255, 99, 132)',
                    'data' => $valueGraphRel,
                ],
            ],
        ]);
        $chartRel->setOptions([
            'scales' => [
                'yAxes' => [
                    ['ticks' => ['min' => 0, 'max' => 1]],
                ],
            ],
        ]);

        return $this->render('equipment/show.html.twig', [
            'equipment' => $equipment,
            'functionalUnit' => $functionalUnit->findBy(['equipment' => $equipment]),
            'techical_index' => $indexs,
            'chartTech' => $chart,
            'chartRel' => $chartRel,
        ]);
    }

    #[Route('/{id}/edit', name: 'equipment_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Equipment $equipment): Response
    {
        $form = $this->createForm(EquipmentType::class, $equipment);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $a = $form->get('units')->getData();
            $equipment->addUnit($form->get('units')->getData());
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('equipment_index');
        }

        return $this->render('equipment/edit.html.twig', [
            'equipment' => $equipment,
            'form' => $form->createView(),
        ]);
    }

    #[Route('/{id}', name: 'equipment_delete', methods: ['POST'])]
    public function delete(Request $request, Equipment $equipment): Response
    {
        if ($this->isCsrfTokenValid('delete' . $equipment->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($equipment);
            $entityManager->flush();
        }

        return $this->redirectToRoute('equipment_index');
    }
}
