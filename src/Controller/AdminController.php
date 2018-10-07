<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Article;
use App\Form\ArticleType;
use App\Entity\Devis;
use App\Form\DevisType;

class AdminController extends AbstractController
{

	/**
     * @Route("/admin/articles", name="articles")
     */
    public function articles()
    {
        return $this->render('admin/articles.html.twig', [
            'controller_name' => 'AdminController',
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
     * @Route("/admin/article/edit", name="article_edit")
     */
    public function articleEdit()
    {
        return $this->render('admin/articleEdit.html.twig', [
            'controller_name' => 'AdminController',
        ]);
    }

    /**
     * @Route("/admin/article/delete", name="article_delete")
     */
    public function articleDelete()
    {

    }

    /**
     * @Route("/admin/commentaires", name="commentaires")
     */
    public function commentaires()
    {
        return $this->render('admin/commentaires.html.twig', [
            'controller_name' => 'AdminController',
        ]);
    }

    /**
     * @Route("/admin/commentaire/delete", name="commentaire_delete")
     */
    public function commentaireDelete()
    {

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

        $form = $this->createForm(DevisType::class, $devis);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {
            $devis->setDateAjout(new \DateTime());
            $devis->setStatut("nouveaux");

            $manager = $this->getDoctrine()->getManager();
            $manager->persist($devis);
            $manager->flush();

            return $this->redirectToRoute('devis_nouveaux');
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
     * @Route("/admin/devis/edit", name="devis_edit")
     */
    public function devisEdit()
    {
        return $this->render('admin/devisEdit.html.twig', [
            'controller_name' => 'AdminController',
        ]);
    }

    /**
     * @Route("/admin/devis/delete", name="devis_delete")
     */
    public function devisDelete()
    {

    }   
}
