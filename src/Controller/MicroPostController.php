<?php

namespace App\Controller;

use App\Entity\MicroPost;
use App\Repository\MicroPostRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/micro-post', name: 'app_micro_post_')]
class MicroPostController extends AbstractController
{
    public function __construct(private MicroPostRepository $microPostRepository)
    {
    }

    #[Route('/', name: 'show')]
    public function index(): Response
    {
        return $this->render('micro_post/index.html.twig', [
            'posts' => $this->microPostRepository->findAll(),
        ]);
    }

    #[Route('/{post}', name: 'show_one')]
    public function showOne(MicroPost $post): Response
    {
        return $this->render('micro_post/show.html.twig', [
            'post' => $post,
        ]);
    }
}
