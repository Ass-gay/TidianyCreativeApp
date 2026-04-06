<?php

    session_start();
    require_once("ServiceReaController.php");

    $serviceReaController = new ServiceReaController();

    // Ajout d'un service/realisation
    if (isset($_POST['frmAddServiceRea'])) {
        $serviceReaController->addServiceRea();
    }

    // Suppresion d'un service/realisation
    if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'], $_GET['action']) && $_GET['action'] === 'delete') {
        $serviceReaController->desactivateServiceRea();
    }

    // Edition d'un service/realisation
    if (isset($_POST['frmEditServiceRea'])) {
        $serviceReaController->editServiceRea();
    }

    // Restauration d'un service/realisation
    if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'], $_GET['action']) && $_GET['action'] === 'restaurer') {
        $serviceReaController->activateServiceRea();
    }

     // Suppresion def d'un service/realisation
    if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'], $_GET['action']) && $_GET['action'] === 'supDef') {
        $serviceReaController->supDefServiceRea();
    }
?>