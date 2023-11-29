<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

use Doctrine\Persistence\ManagerRegistry;

use Symfony\Component\HttpFoundation\Request;

class FolderController extends AbstractController
{
    public function __construct(private ManagerRegistry $doctrine) {}

    #[Route("/folders", name: "app_folders_get", methods: ["GET"], schemes: ["http", "https"])]
    public function get(Request $request): JsonResponse
    {
        // $this->expressionRepository = $container->get("doctrine")->getRepository("App:Expression");
        $foldersRepository = $this->doctrine->getManager()->getRepository("App\Entity\VideoFolder");

        $folders = $foldersRepository->findAll();

        $array = [];
        foreach ($folders as $folder) {
            $array[] = $folder->serialize();
        }

        return $this->json($array);
    }
}
