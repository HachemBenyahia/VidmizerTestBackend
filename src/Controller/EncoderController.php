<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

use Doctrine\Persistence\ManagerRegistry;

use Symfony\Component\HttpFoundation\Request;

class EncoderController extends AbstractController
{
    public function __construct(private ManagerRegistry $doctrine) {}

    #[Route("/encoders", name: "app_encoders_get", methods: ["GET"], schemes: ["http", "https"])]
    public function get(Request $request): JsonResponse
    {
        // $this->expressionRepository = $container->get("doctrine")->getRepository("App:Expression");
        $encoderRepository = $this->doctrine->getManager()->getRepository("App\Entity\VideoEncoder");


        if ($request->query->get("idVideo") !== null)
        {
            $idVideo = intval($request->query->get("idVideo"));

            // $encoderRepository = $this->doctrine->getManager()->getRepository("App\Entity\VideoEncoder");

            $encoders = $encoderRepository->findBy(["idVideo" => $idVideo]);
            if ($encoders) {
                $array = [];
                foreach ($encoders as $encoder) {
                    $encoders[] = $encoder->serialize();
                }
            }

            return $this->json($encoders);
        }


        $encoders = $encoderRepository->findAll();

        $array = [];
        foreach ($encoders as $encoder) {
            $array[] = $encoder->serialize();
        }

        return $this->json($array);
    }
}
