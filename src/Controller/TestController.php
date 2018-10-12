<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Article;
use App\Entity\Devis;
use App\Form\ArticleType;
use App\Entity\Commentaire;
use App\Form\CommentaireType;

class TestController extends AbstractController
{
    /**
     * @Route("/test/{id}", name="test")
     */
    public function index(Article $article, Request $request)
    {
    	$commentaire = new Commentaire();

        $form = $this->createForm(CommentaireType::class, $commentaire);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {
            $commentaire->setDateAjout(new \DateTime());
            $commentaire->setArticle($article);

            $manager = $this->getDoctrine()->getManager();
            $manager->persist($commentaire);
            $manager->flush();
        }

        return $this->render('test/index.html.twig', [
            'controller_name' => 'TestController',
            'article' => $article,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/test/devis/{id}", name="testDevis")
     */
    public function testDevis(Devis $devis)
    {
        return $this->render('admin/emails/devisEnvoyer.html.twig', [
            'controller_name' => 'TestController',
            'devis' => $devis,
        ]);
    }
}
