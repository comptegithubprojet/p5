<?php

namespace App\Controller;

use App\Form\ContactType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Contact;
use App\Entity\Devis;
use App\Entity\Article;
use App\Entity\Commentaire;
use App\Entity\Newsletter;
use App\Form\DevisType;
use App\Form\CommentaireType;
use App\Form\NewsletterType;
use App\Service\addNewsletter;

class DefaultController extends AbstractController
{
    /**
     * @Route("/", name="accueil")
     */
    public function index(Request $request)
    {
    	$newsletter = new Newsletter();

        $form = $this->createForm(NewsletterType::class, $newsletter);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {
            $manager = $this->getDoctrine()->getManager();
            $manager->persist($newlsetter);
            $manager->flush();

            return $this->redirectToRoute('accueil');
        }

        return $this->render('index.html.twig', array(
        	'form' => $form->createView(),
        ));
    }

	/**
	 * @Route("/nos-services", name="services")
	 */
    public function service(){
	    return $this->render('services.html.twig');
    }

	/**
	 * @Route("/presentation-de-notre-agence-Digiteam", name="agenceDigiTeam")
	 */
	public function agency(){
		return $this->render('agency.html.twig');
	}

	/**
	 * @Route("/nos-expertises", name="expertise")
	 */
	public function expertise(){
		return $this->render('expertise.html.twig');
	}

	/**
	 * @Route("/notre-blog", name="blog")
	 */
	public function blog()
	{
		$repository = $this->getDoctrine()->getRepository(Article::class);

        $articles = $repository->findAll();

		return $this->render('blog.html.twig', array(
			'articles' => $articles,
		));
	}

	/**
	 * @Route("/article/{id}", name="article")
	 */
	public function article(Article $article, Request $request, addNewsletter $addNewsletter)
	{

		$commentaire = new Commentaire();

        $form = $this->createForm(CommentaireType::class, $commentaire);

        $commentaire->setDateAjout(new \DateTime());
        $commentaire->setArticle($article);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {
            $manager = $this->getDoctrine()->getManager();

            if($commentaire->getCaseNewsletter() == 'true')
            {
                $newsletter = $addNewsletter->add($commentaire);
                $manager->persist($newsletter);
            }

            $manager->persist($commentaire);
            $manager->flush();

            return $this->redirectToRoute('article', array(
            	'id' => $article->getId(),
            ));
        }

		return $this->render('articleBlog.html.twig', array(
			'article' => $article,
			'form' => $form->createView(),
		));
	}

	/**
	 * @Route("/authentification-administration", name="authentification")
	 */
	public function authentif(){
		return $this->render('authentification.html.twig');
	}

	/**
 * @Route("/plan-du-site", name="siteMap")
 */
	public function sitemap(){
		return $this->render('siteMap.html.twig');
	}

	/**
	 * @Route("/Mentions-Legales", name="mentionsLegales")
	 */
	public function mentionsLegales(){
		return $this->render('mentionsLegales.html.twig');
	}

	/**
	 * @Route("/mail", name="mail")
	 */
	public function mail(){
		return $this->render('/emails/sendDevis.html.twig');
	}

}
