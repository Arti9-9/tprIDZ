<?php

namespace App\Controller;

use App\Entity\Equipment;
use App\Entity\Reliabilities;
use App\Entity\ReliabilitiesIGrP;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ReliabilityEquipmentController extends AbstractController
{
    #[Route('/reliability/equipment/{id}', name: 'reliability_equipment', methods: ['GET'])]
    public function index(Equipment $equipment): Response
    {
        $newReliability = new Reliabilities();
        $tmpValue = 0.0;
        $units = $equipment->getUnits();
        foreach ($units as $unit) {

            foreach ($unit->getParameters() as $parameter){
                $reliabilityI = new ReliabilitiesIGrP();
                $tmpPi = exp((-1.0)*$parameter->getLambda()*$parameter->getWeight());
            }
        }
        $newReliability->setValue($tmpValue);
        $newReliability->setEquipment($equipment);
        $newReliability->setDate(new \DateTime('@' . strtotime('now')));
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($newReliability);
        $entityManager->flush();
        return $this->render('reliability_equipment/index.html.twig', [
            'controller_name' => 'ReliabilityEquipmentController',
        ]);
    }
}
