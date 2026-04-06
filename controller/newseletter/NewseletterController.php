<?php

use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;

    require_once("../../model/NewseletterRepository.php");
    require "../../vendor/autoload.php";

    
    class NewseletterController
    {
        private $newseletterRepository;
        
        public function __construct()
        {
            $this->newseletterRepository = new NewseletterRepository();
        }

        // Permet de faire la gestion message des erreurs
        public function setErrorAndRedirect($message, $title, $redirectUrl = "home")
        {
            $_SESSION["error"] = $message;
            header("Location: $redirectUrl?error=1&message=" . urldecode($message) . "&title=" . urldecode($title));
            exit;
        }

        // Permet de faire la gestion message des success
        public function setSuccessAndRedirect($message, $title, $redirectUrl = "home")
        {
            $_SESSION["success"] = $message;
            header("Location: $redirectUrl?success=1&message=" . urldecode($message) . "&title=" . urldecode($title));
            exit;
        }

        // Permet d'ajouter un newseletter dans la BD
        public function add()
        {
            if ($_SERVER["REQUEST_METHOD"] === 'POST') {
                
                // Recuperation des donnees du formulaire
                $email = trim($_POST['add-newseletter-email'] ?? '');

                // Validation des donnees
                if (empty($email)) {
                    $this->setErrorAndRedirect("L'email est obligatoires.", "Erreur d'inscription");
                }

                // Validation email
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $this->setErrorAndRedirect("L'adresse email est invalide.", "Erreur d'inscription");
                }

                // Appel de la methode add pour inserer dans la BD
                try {
                   $reponse = $this->newseletterRepository->add($email);
                   if ($reponse) {
                    $this->setSuccessAndRedirect("Vous recevrez tous nos nouvelles par e-mail", "Inscription reussie");
                   }
                   else
                    {
                        $this->setErrorAndRedirect("Une erreur est survenue lors de l'inscription a la newseltter.", "Erreur d'inscription");
                    }
                } catch (Exception $error) {
                        $this->setErrorAndRedirect("Erreur" . $error->getMessage(), "Erreur d'inscription");
                }
            }
        }

        // Permet d'envoyer un Message a mes abones
        public function sendMessageMail($email, $message)
        {
            $mail = new PHPMailer(true);

            try {
                // Configuration du server SMPT
                $mail->isSMTP();
                $mail->Host = 'sandbox.smtp.mailtrap.io';
                $mail->SMTPAuth = true;
                $mail->Username = '79883b2a337251';
                $mail->Password = '7add485721e1d3';
                $mail->Port = 2525;

                // Expediteur
                $mail->setFrom('no-reply@tidianycreative.com', 'Tidiany Creative');
                // Destinateur
                $mail->addAddress($email, 'Inscrit a la newseletter');

                // Contenu de l'email
                $mail->isHTML(true);
                $mail->Subject = 'Information - Tidiany Créative';
                $mail->Body = "
                    <h1>Bienvenue <b>{$email}</b> !</h1>
                    <p>{$message} :</p>

                    <p>Merci de votre fidelite.</p>
                ";
                // Envoyer de l'email
                $mail->send();
                
            } catch (Exception $error) {
                echo "Erreur lors de envoi de l'email :  {$mail->ErrorInfo}" ;
            }
        }
    }