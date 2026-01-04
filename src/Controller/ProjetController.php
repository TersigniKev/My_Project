<?php

namespace App\Controller;

use App\Entity\Projet;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\ProjetRepository;

final class ProjetController extends AbstractController
{
    #[Route('/projet', name: 'app_projet')]
    public function index(ProjetRepository $projetRepository): Response
    {
        $projets = $projetRepository->findAll();
        return $this->render('projet/index.html.twig', [
            'projets' => $projets,
        ]);
    }

    #[Route('projet/{id}', name: 'app_show', methods: ['GET'], requirements: ['id' => '\d+']) ]
    public function show(Projet $projets): Response
    {
        return $this->render('projet/show.html.twig', [
            'projets' => $projets,
        ]);
    }
}
