<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Article;

class ArticleFixture extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $article = new Article();
        $article->setTitle("Configuration du fichier .env")
                ->setDescription("<p> Dans cet article je vais vous expliquer ce qu'est un fichier .env. </p>");

        $manager->persist($article);
        $manager->flush();

        $manager->flush();
    }
}
