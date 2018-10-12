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

class FormController extends AbstractController
{
    /**
     * @Route("/contact2", name="contact2")
     */
    public function contact2(Request $request, addNewsletter $addNewsletter, \Swift_Mailer $mailer)
    {
    	$contact = new Contact();

        $form = $this->createForm(ContactType::class, $contact);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {
        	$manager = $this->getDoctrine()->getManager();

        	if($contact->getCaseNewsletter() == 'true')
        	{
        		$newsletter = $addNewsletter->add($contact);
        		$manager->persist($newsletter);
        	}

            $message = (new \Swift_Message('Demande de contact'))
            ->setFrom($contact->getEmail())
            ->setTo('digiteamp5@gmail.com')
            ->setBody(
                $this->renderView(
                    // templates/emails/registration.html.twig
                    'emails/registration.html.twig',
                    array('contact' => $contact)
                ),
                'text/html'
            )
            ;

            $mailer->send($message);        	

            
            $manager->persist($contact);
            $manager->flush();

            return $this->redirectToRoute('accueil');
        }
        return $this->render('form/contact.html.twig', [
            'controller_name' => 'FormController',
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/devis2", name="devis2")
     */
    public function devis2(Request $request, addNewsletter $addNewsletter)
    {
    	$devis = new Devis();

        $form = $this->createForm(DevisType::class, $devis);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {
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
