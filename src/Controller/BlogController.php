<?php

namespace App\Controller;

use App\Entity\Article;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BlogController extends AbstractController
{
    /**
     * @Route("/blog", name="blog")
     */
    public function index(): Response
    {
        $repo = $this->getDoctrine()->getRepository(Article::class);

        $articles = $repo->findAll();

        return $this->render('blog/index.html.twig', [
            'controller_name' => 'BlogController',
            'articles' => $articles
        ]);
    }

    /**
     * @Route("/blog/{slug}-{id}", name="blog_article", requirements={"slug": "[a-z0-9\-]*"})
     * @param $id
     * @return Response
     */
    public function show($id): Response
    {
        $repo = $this->getDoctrine()->getRepository(Article::class);
        $articles = $repo->find($id);
        return $this->render('blog_article/index.html.twig', [
            'controller_name' => 'BlogController',
            'article' => $articles
        ]);
    }
}

