<?php

    session_start();
    require_once("NewseletterController.php");

    $newseletterController = new NewseletterController();
    $newseletterRepository = new NewseletterRepository();

    // Ajout d'un newseletter
    if (isset($_POST['frmAddNewseletter'])) {
        $newseletterController->add();
    }

    // Envoi message newseletter
    if (isset($_POST['frmSendMessage'])) {
        $message = $_POST["message"];

        $listeNewseletter = $newseletterRepository->getAll();

        if (empty($listeNewseletter)) {
            $message = "Aucun newseletter trouve dans la base de donnees";

            $_SESSION["error"] = $message;
            header("Location: listeNewseletter?error=1&message=" . urldecode($message) . "&title=" ."Newseletter");
            exit;
        }

        foreach ($listeNewseletter as $newseletter) {
            $newseletterController->sendMessageMail($newseletter['email'], $message);
        }

        $messageSuccess = "Message envoyer avec succes.";

            $_SESSION["error"] = $message;
            header("Location: listeNewseletter?success=1&message=" . urldecode($messageSuccess) . "&title=" ."Newseletter");
            exit;
        
    }
?>