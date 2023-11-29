<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

use Doctrine\Persistence\ManagerRegistry;

use Symfony\Component\HttpFoundation\Request;

class VideoController extends AbstractController
{
    public function __construct(private ManagerRegistry $doctrine) {}

    // I tried /{id}/{encoder} but it didn't work.
    #[Route("/videos/{id}", defaults: ["id" => 0], name: "app_videos_get", methods: ["GET"], schemes: ["http", "https"])]
    public function get(Request $request, int $id): JsonResponse
    {
        $videosRepository = $this->doctrine->getManager()->getRepository("App\Entity\VideoSource");

        if ($id > 0) {
            $video = $videosRepository->find($id);
            if ($video) {

                if ($request->query->get("encoder") !== null)
                {
                    $encoder = intval($request->query->get("encoder"));

                    $encoderRepository = $this->doctrine->getManager()->getRepository("App\Entity\VideoEncoder");

                    $encoder = $encoderRepository->findOneBy(["idVideo" => $id]);
                    // if ($encoders) {
                    //     $array = [];
                    //     foreach ($encoders as $encoder) {
                    //         $encoders[] = $encoder->serialize();
                    //     }
                    // }

                    $video->setSize($encoder->getSize());
                }


                return $this->json($video->serialize());
            }
            else {
                return $this->json(["message" => "The video doesn't exist."]);
            }
        }

        // https://stackoverflow.com/questions/52324929/how-to-get-query-string-in-symfony-4

        $videos = $videosRepository->findAll();

        $array = [];
        foreach ($videos as $video) {
            $array[] = $video->serialize();
        }

        return $this->json($array);
    }





//
//
//     #[Route("/expressions/{id}", name: "app_expressions_get_id", methods: ["GET"], schemes: ["http", "https"])]
//     public function getById(Request $request, int $id): JsonResponse
//     {
//         // $this->expressionRepository = $container->get("doctrine")->getRepository("App:Expression");
//         $expressionRepository = $this->doctrine->getManager()->getRepository("App\Entity\Expression");
//
//         // $id = $request->query->get("id");
//
//         $id = intval($id);
//
//         if ($id > 0) {
//             $expression = $expressionRepository->find($id);
//
//             if (!$expression) {
//                 return $this->json(["message" => "The requested expression does not exist or you are not allowed to access it."], 404);
//             }
//
//             return $this->json($expression->toArray());
//         } else {
//             return $this->json(["message" => "Please specify an id > 0."], 400);
//         }
//     }
//
//
//     #[Route("/expressions", name: "app_expressions_post", methods: ["POST"], schemes: ["http", "https"])]
//     public function post(): JsonResponse
//     {
//         return $this->json([]);
//     }
//
//
// ///////////////////////////////////////////////////////// ici
//
//
//     #[Route("/expressions/{id}", name: "app_expressions_patch", methods: ["PATCH"], schemes: ["http", "https"])]
//     public function patch(Request $request, int $id): JsonResponse
//     {
//
//
//         return $this->json([]);
//     }
//
//     #[Route("/expressions/{id}", name: "app_expressions_delete", methods: ["DELETE"], schemes: ["http", "https"])]
//     public function delete(Request $request, int $id): JsonResponse
//     {
//         // In constructor?
//         $manager = $this->doctrine->getManager();
//         $expressionRepository = $manager->getRepository("App\Entity\Expression");
//
//         $id = intval($id);
//
//         if ($id > 0) {
//             $expression = $expressionRepository->find($id);
//
//             $expression = $expressionRepository->findOneBy(["id" => intval($id)]); //, "expression" => $this->expression]);
//             if (!$expression) {
//                 return $this->json(["message" => "The requested expression does not exist or you are not allowed to access it."], 404);
//             }
//
//             $manager->remove($expression);
//             $manager->flush();
//
//             return $this->get($request);
//             // return $this->json(["message" => "The expression was succesfully deleted."], 204);
//         } else {
//             return $this->json(["message" => "Please specify an id > 0."], 400);
//         }
//     }
}
