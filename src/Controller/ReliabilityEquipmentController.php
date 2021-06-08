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
        $i = 0;
        $units = $equipment->getUnits()->getValues();
        $diff = (new \DateTime())->diff($equipment->getDate());
        foreach ($units as $unit) {
            foreach ($unit->getParameters() as $parameter){
                $reliabilityI = new ReliabilitiesIGrP();
                $reliabilityI->setValue(exp((-1.0)*pow($parameter->getLambda(),-5)*$parameter->getWeight())*$diff->y);
                $tmpValue += $reliabilityI->getValue();
                $i++;
                $reliabilityI->setDate(new \DateTime('@' . strtotime('now')));
                $reliabilityI->setGroupParametr($parameter);
                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->persist($reliabilityI);
                $entityManager->flush();
            }
        }
        $newReliability->setValue($tmpValue/$i/10);
        $newReliability->setEquipments($equipment);
        $newReliability->setDate(new \DateTime('@' . strtotime('now')));
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($newReliability);
        $entityManager->flush();
        return $this->redirectToRoute('equipment_show',['id'=>$equipment->getId()]);
    }
}
