<?php

    session_start();
    require_once("ServiceReaController.php");

    $serviceReaController = new ServiceReaController();

    // Ajout un service/realisation
    if (isset($_POST['frmAddServiceRea'])) {
        $serviceReaController->addServiceRea();
    }
?>