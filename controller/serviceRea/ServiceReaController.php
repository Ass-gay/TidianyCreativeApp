<?php 

    require_once("../../model/ServiceReaRepository.php");

    
    class ServiceReaController
    {
        private $serviceReaRepository;
        
        public function __construct()
        {
            $this->serviceReaRepository = new ServiceReaRepository();
        }

        // Permet de faire la gestion message des erreurs
        public function setErrorAndRedirect($message, $title, $redirectUrl = "listeServiceRea")
        {
            $_SESSION["error"] = $message;
            header("Location: $redirectUrl?error=1&message=" . urldecode($message) . "&title=" .urldecode("Erreur d'ajout."));
            exit;
        }

        // Permet de faire la gestion message des success
        public function setSuccessAndRedirect($message, $title, $redirectUrl = "listeServiceRea")
        {
            $_SESSION["success"] = $message;
            header("Location: $redirectUrl?success=1&message=" . urldecode($message) . "&title=" .urldecode("Ajout reussi."));
            exit;
        }

        // Permet d'ajouter un serviceRea dans la BD
        public function addServiceRea()
        {
            if ($_SERVER["REQUEST_METHOD"] === 'POST') {
                
                // Recuperation des donnees du formulaire
                $nom = trim($_POST['nom'] ?? '');
                $description = trim($_POST['description'] ?? '');
                $type = trim($_POST['type'] ?? '');
                $photo = $_FILES['photo'] ?? null;
                $createdBy = $_SESSION['id'] ?? null;

                // Validation des donnees
                if (empty($nom) || empty($description) || empty($type) || !$photo) {
                    $this->setErrorAndRedirect("Tous les champs sont obligatoires.", "Erreur d'ajout");
                }

                // Validation du type
                if (!in_array($type, ['R', 'S'])) {
                    $this->setErrorAndRedirect("Le type selectionne est invalide.", "Erreur d'ajout");
                }

                // Validation de la photo
                if ($photo['error'] !== UPLOAD_ERR_OK) {
                    $this->setErrorAndRedirect("Une erreur est survenue lors de la telechargement de la photo.", "Erreur d'ajout");
                }

                // Recuperation de la photo
                $uploadDir = "../../public/images/servicesRea/";
                $photoName = uniqid() . "_" . basename($photo['name']);
                $uploadPath = $uploadDir . $photoName;

                // Deplacement de la photo
                if (!move_uploaded_file($photo['tmp_name'], $uploadPath)) {
                    $this->setErrorAndRedirect("Echec du telechargement de la photo.", "Erreur d'ajout");
                }

                // Appel de la methode add pour inserer dans la BD
                try {
                   $reponse = $this->serviceReaRepository->add($nom, $description, $photoName, $type, $createdBy);
                   if ($reponse) {
                    $msg = $type == 'R' ? "Realisation ajoutee avec success." : "Service ajoutee avec success.";
                    $this->setSuccessAndRedirect($msg, "Ajout reussie");
                   }
                   else
                    {
                        $this->setErrorAndRedirect("Une erreur est survenue lors de l'ajout.", "Erreur d'ajout");
                    }
                } catch (Exception $error) {
                        $this->setErrorAndRedirect("Erreur" . $error->getMessage(), "Erreur d'ajout");
                }
            }
        }
    }
?>