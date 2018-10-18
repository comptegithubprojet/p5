<?php

namespace App\Service;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class SendMail extends \Twig_Extension 
{
	private $twig;

	public function __construct(\Twig_Environment $twig)
	{
		$this->twig = $twig;
	}

    public function SendMailContact($contact) {

		$mail = new PHPMailer();
		$mail->isSMTP(); // Paramétrer le Mailer pour utiliser SMTP
		$mail->Host = 'smtp.gmail.com'; // Spécifier le serveur SMTP
		$mail->SMTPAuth = true; // Activer authentication SMTP
		$mail->Username = 'digiteamp5@gmail.com'; // Votre adresse email d'envoi
		$mail->Password = 'digiteam123'; // Le mot de passe de cette adresse email
		$mail->SMTPSecure = 'ssl'; // Accepter SSL
		$mail->Port = 465;
		$mail->Subject  = $contact->getSujet();
		$mail->setFrom($contact->getEmail(), 'Demande de contact'); // Personnaliser l'envoyeur
		$mail->addAddress('digiteamp5@gmail.com'); // Ajouter le destinataire
		$mail->isHTML(true); // Paramétrer le format des emails en HTML ou non
		$mail->Body = $this->twig->render(
			'emails/recevoirEmail.html.twig',
			array(
				'contact' => $contact,
			)
		);
		//$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
		$mail->send();
	}

	public function SendMailDevis($devis, $dateExpiration) {

		$mail = new PHPMailer();
		$mail->isSMTP(); // Paramétrer le Mailer pour utiliser SMTP
		$mail->Host = 'smtp.gmail.com'; // Spécifier le serveur SMTP
		$mail->SMTPAuth = true; // Activer authentication SMTP
		$mail->Username = 'digiteamp5@gmail.com'; // Votre adresse email d'envoi
		$mail->Password = 'digiteam123'; // Le mot de passe de cette adresse email
		$mail->SMTPSecure = 'ssl'; // Accepter SSL
		$mail->Port = 465;
		$mail->Subject  = 'Demande de devis';
		$mail->setFrom('digiteamp5@gmail.com', 'Digiteam'); // Personnaliser l'envoyeur
		$mail->addAddress($devis->getEmail()); // Ajouter le destinataire
		$mail->AddAttachment($_SERVER["DOCUMENT_ROOT"] . '/pdf/conditionvente.pdf', 'conditionvente.pdf');
		$mail->isHTML(true); // Paramétrer le format des emails en HTML ou non
		$mail->Body = $this->twig->render(
			'admin/emails/devisEnvoyer.html.twig',
			array(
				'devis' => $devis,
				'dateExpiration' => $dateExpiration,
			)
		);
		//$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
		$mail->send();
	}
}