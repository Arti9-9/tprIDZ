<?php

namespace App\Controller;

use App\Entity\Equipment;
use App\Entity\FunctionalUnit;
use App\Entity\TechicalIndexs;
use App\Repository\FunctionalUnitRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\UX\Chartjs\Builder\ChartBuilderInterface;

class FindTechIndexController extends AbstractController
{
    #[Route('/find/tech/index/{id}', name: 'find_tech_index', methods: ['GET'])]
    public function index(Equipment $equipment): Response
    {
        $newTechIndex = new TechicalIndexs();
        $tmpValue = 0.0;
        $units = $equipment->getUnits();
        foreach ($units as $unit){
            $tmpValue = $tmpValue + $unit->getWeight() * $unit->getAppraisal();
        }
        $newTechIndex->setValue($tmpValue);
        $newTechIndex->setEquipment($equipment);
        $newTechIndex->setDate(new \DateTime('@' . strtotime('now')));
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($newTechIndex);
        $entityManager->flush();
        return $this->redirectToRoute('equipment_show',['id'=>$equipment->getId()]);
    }
}
