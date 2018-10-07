<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Article;
use App\Form\ArticleType;
use App\Entity\Commentaire;
use App\Form\CommentaireType;
use App\Entity\Devis;
use App\Form\DevisBackofficeType;

class AdminController extends AbstractController
{

	/**
     * @Route("/admin/articles", name="articles")
     */
    public function articles()
    {
        $repository = $this->getDoctrine()->getRepository(Article::class);

        $articles = $repository->findAll();

        return $this->render('admin/articles.html.twig', [
            'controller_name' => 'AdminController',
            'articles' => $articles,
        ]);
    }

    /**
     * @Route("/admin/article/add", name="article_add")
     */
    public function articleAdd(Request $request)
    {
        $article = new Article();

        $form = $this->createForm(ArticleType::class, $article);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {
            $article->setDateAjout(new \DateTime());

            $manager = $this->getDoctrine()->getManager();
            $manager->persist($article);
            $manager->flush();

            return $this->redirectToRoute('articles');
        }

        return $this->render('admin/articleAdd.html.twig', [
            'controller_name' => 'AdminController',
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/admin/article/edit/{id}", name="article_edit")
     */
    public function articleEdit(Article $article, Request $request)
    {
        $form = $this->createForm(ArticleType::class, $article);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {
            $article->setDateModification(new \DateTime());

            $manager = $this->getDoctrine()->getManager();
            $manager->persist($article);
            $manager->flush();

            return $this->redirectToRoute('articles');
        }

        return $this->render('admin/articleEdit.html.twig', [
            'controller_name' => 'AdminController',
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/admin/article/delete/{id}", name="article_delete")
     */
    public function articleDelete(Article $article)
    {      
        $entityManager = $this->getDoctrine()->getManager();      
        $entityManager->remove($article);
        $entityManager->flush();

        return $this->redirectToRoute('articles');        
    }

    /**
     * @Route("/admin/commentaires", name="commentaires")
     */
    public function commentaires()
    {
        $repository = $this->getDoctrine()->getRepository(Commentaire::class);

        $commentaires = $repository->findAll();

        return $this->render('admin/commentaires.html.twig', [
            'controller_name' => 'AdminController',
            'commentaires' => $commentaires,
        ]);
    }

    /**
     * @Route("/admin/commentaire/delete/{id}", name="commentaire_delete")
     */
    public function commentaireDelete(Commentaire $commentaire)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->remove($commentaire);
        $entityManager->flush();

        return $this->redirectToRoute('commentaires');  
    }

    /**
     * @Route("/admin/devis/nouveaux", name="devis_nouveaux")
     */
    public function devisNouveaux()
    {
        $repository = $this->getDoctrine()->getRepository(Devis::class);

        $devis = $repository->findBy(['statut' => 'nouveaux']);

        return $this->render('admin/devisNouveaux.html.twig', [
            'controller_name' => 'AdminController',
            'devis' => $devis,
        ]);
    }

    /**
     * @Route("/admin/devis/signes", name="devis_signes")
     */
    public function devisSignes()
    {
        $repository = $this->getDoctrine()->getRepository(Devis::class);

        $devis = $repository->findBy(['statut' => 'signes']);

        return $this->render('admin/devisSignes.html.twig', [
            'controller_name' => 'AdminController',
            'devis' => $devis,
        ]);
    }

    /**
     * @Route("/admin/devis/enAttente", name="devis_enAttente")
     */
    public function devisEnAttente()
    {
        $repository = $this->getDoctrine()->getRepository(Devis::class);

        $devis = $repository->findBy(['statut' => 'en attente']);

        return $this->render('admin/devisEnAttente.html.twig', [
            'controller_name' => 'AdminController',
            'devis' => $devis,
        ]);
    }

    /**
     * @Route("/admin/devis/add", name="devis_add")
     */
    public function devisAdd(Request $request)
    {
        $devis = new Devis();

        $form = $this->createForm(DevisBackofficeType::class, $devis);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {
            $devis->setDateAjout(new \DateTime());
            $devis->setCaseNewsletter(0);
            $devis->setCaseObligatoire(1);

            $manager = $this->getDoctrine()->getManager();
            $manager->persist($devis);
            $manager->flush();

            $statutDevis = $devis->getStatut();

            if($statutDevis == "nouveaux")
            {
                return $this->redirectToRoute('devis_nouveaux');
            }
            elseif($statutDevis == "en attente")
            {
                return $this->redirectToRoute('devis_enAttente');
            }
            elseif($statutDevis == "signes")
            {
                return $this->redirectToRoute('devis_signes');
            } 
        }

        return $this->render('admin/devisAdd.html.twig', [
            'controller_name' => 'AdminController',
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/admin/devis/send", name="devis_send")
     */
    public function devisSend()
    {
        return $this->render('admin/devisSend.html.twig', [
            'controller_name' => 'AdminController',
        ]);
    }

    /**
     * @Route("/admin/devis/edit/{id}", name="devis_edit")
     */
    public function devisEdit(Devis $devis, Request $request)
    {
        $form = $this->createForm(DevisBackofficeType::class, $devis);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {
            $devis->setDateModification(new \DateTime());

            $manager = $this->getDoctrine()->getManager();
            $manager->persist($devis);
            $manager->flush();

            $statutDevis = $devis->getStatut();

            if($statutDevis == "nouveaux")
            {
                return $this->redirectToRoute('devis_nouveaux');
            }
            elseif($statutDevis == "en attente")
            {
                return $this->redirectToRoute('devis_enAttente');
            }
            elseif($statutDevis == "signes")
            {
                return $this->redirectToRoute('devis_signes');
            } 
        }

        return $this->render('admin/devisEdit.html.twig', [
            'controller_name' => 'AdminController',
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/admin/devis/delete/{id}", name="devis_delete")
     */
    public function devisDelete(Devis $devis)
    {
        $statutDevis = $devis->getStatut();

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->remove($devis);
        $entityManager->flush();

        if($statutDevis == "nouveaux")
        {
            return $this->redirectToRoute('devis_nouveaux');
        }
        elseif($statutDevis == "en attente")
        {
            return $this->redirectToRoute('devis_enAttente');
        }
        elseif($statutDevis == "signes")
        {
            return $this->redirectToRoute('devis_signes');
        }    
    }   
}
