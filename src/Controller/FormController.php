<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Contact;
use App\Form\ContactType;
use App\Entity\Devis;
use App\Form\DevisType;
use App\Service\addNewsletter;
use App\Service\recevoirEmail;

class FormController extends AbstractController
{
    /**
     * @Route("/contact", name="contact")
     */
    public function contact(Request $request, addNewsletter $addNewsletter, \Swift_Mailer $mailer)
    {
        $contact = new Contact();

        $form = $this->createForm(ContactType::class,$contact);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {
            $this->addFlash(
                'notice',
                'Nous avons bien reçu votre demande de contact. Nous nous dépêchons pour vous apporter une réponse très rapidement !'
            );

            $manager = $this->getDoctrine()->getManager();

            if($contact->getCaseNewsletter() == 'true')
            {
                $newsletter = $addNewsletter->add($contact);
                $manager->persist($newsletter);
            }

            $manager->persist($contact);
            $manager->flush();

            $message = (new \Swift_Message($contact->getSujet()))
                ->setFrom($contact->getEmail())
                ->setTo('digiteamp5@gmail.com')
                ->setBody(
                    $this->renderView(
                        'emails/recevoirEmail.html.twig',
                        array('contact' => $contact)
                    ),
                    'text/html'
                )
            ;

            $mailer->send($message);

            return $this->redirectToRoute('accueil');
        }
        return $this->render('form/contact.html.twig', [
            'controller_name' => 'DefaultController',
            'form' => $form->createView(),
        ]);
    }


    /**
     * @Route("/devis", name="devis")
     */
    public function devis(Request $request, addNewsletter $addNewsletter)
    {
    	$devis = new Devis();

        $form = $this->createForm(DevisType::class, $devis);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {
            $this->addFlash(
                'notice',
                'Nous avons bien reçu votre demande de devis. Nous nous dépêchons pour vous apporter une réponse très rapidement !'
            );

        	$devis->setDateAjout(new \DateTime());
        	$devis->setStatut('nouveaux');

            $manager = $this->getDoctrine()->getManager();

            if($devis->getCaseNewsletter() == 'true')
        	{
        		$newsletter = $addNewsletter->add($devis);
        		$manager->persist($newsletter);
        	}

            $manager->persist($devis);
            $manager->flush();

            return $this->redirectToRoute('accueil');
        }
        
        return $this->render('form/devis.html.twig', [
            'controller_name' => 'FormController',
            'form' => $form->createView(),
        ]);
    }
}
