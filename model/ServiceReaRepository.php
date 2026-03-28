<?php 
    require_once("DbRepository.php");

    class ServiceReaRepository extends DbRepository
    {
        // Recuperer la liste des service ou realisation
        public function getAll(int $etat)
        {
            $sql = "SELECT 
                        sr.*,
                        u1.email as created_by_email,
                        u2.email as updated_by_email
                    FROM servicereas sr
                    LEFT JOIN
                        users u1 ON sr.created_by = u1.id

                    LEFT JOIN
                        users u2 ON sr.updated_by = u2.id
                    WHERE sr.etat = :etat";
            try {
                $statement = $this->db->prepare($sql);
                $statement->execute(['etat' => $etat]);
                $result = $statement->fetchAll(PDO::FETCH_ASSOC);
                return $result ?: null;
            } catch (PDOException $error) {
                $etatLabel = $etat == 1 ? "actives" : "supprimes";
                error_log("Erreur lors de la recuperation des $etatLabel" . $error->getMessage());
                throw $error;
            }
        }

        // Recuperer la liste des service ou realisation
        public function getAllByEtatAndType(int $etat, string $type)
        {
            $sql = "SELECT * FROM servicereas WHERE etat = :etat and type = :type";
            try {
                $statement = $this->db->prepare($sql);
                $statement->execute(['etat' => $etat,'type' => $type]);
                $result = $statement->fetchAll(PDO::FETCH_ASSOC);
                return $result ?: null;
            } catch (PDOException $error) {
                $etatLabel = $etat == 1 ? "actives" : "supprimes";
                $typeLabel = $type == "R" ? "realisations" : "services";
                error_log("Erreur lors de la recuperation des $typeLabel $etatLabel" . $error->getMessage());
                throw $error;
            }
        }

        // Recuperer un service ou realisation via son ID
        public function getServiceReaById(int $id)
        {
            $sql = "SELECT * FROM servicereas WHERE id = :id";
            try {
                $statement = $this->db->prepare($sql);
                // $statement->bindParam(':id', $id, PDO::PARAM_INT);
                $statement->execute([':id' => $id]);
                $result = $statement->fetch(PDO::FETCH_ASSOC);
                return $result ?: null;
            } catch (PDOException $error) {
                error_log("Erreur lors de la recuperation de la realisation/service d'id $id" . $error->getMessage());
                throw $error;
            }
        }

        // Permet d'ajouter une nouvelle réalisation où service
        public function add($nom, $description, $photo, $type, $createdBy)
        {
            $sql = "INSERT INTO servicereas (nom, description, photo, type, etat, created_at, created_by)
                    VALUES (:nom, :description, :photo, :type, default, NOW(), :created_by) ";
            try {
                $statement = $this->db->prepare($sql);
                $statement->execute([
                    'nom' => $nom,
                    'description' => $description,
                    'photo' => $photo,
                    'type' => $type,
                    'created_by' => $createdBy
                ]);
                $lastInsertId = $this->db->lastInsertId();
                return $lastInsertId ?: null;
            } catch (PDOException $error) {
                error_log("Erreur lors de l'ajout de la realisation/service $nom " . $error->getMessage());
                throw $error;
            }
        }

        // Permet de modifier une nouvelle réalisation où service
        public function edit($id, $nom, $description, $photo, $type, $updatedBy)
        {
            $sql = "UPDATE servicereas
                    SET nom = :nom, description = :description, photo = :photo, type = :type,
                    updated_at = NOW(), :updated_by WHERE id = id ";
            try {
                $statement = $this->db->prepare($sql);
                $statement->execute([
                    'nom' => $nom,
                    'description' => $description,
                    'photo' => $photo,
                    'type' => $type,
                    'updated_by' => $updatedBy,
                    'id' => $id
                ]);
                $rowAffected = $statement->rowCount();
                return $rowAffected > 0; // True Si $rowAffected > 0
            } catch (PDOException $error) {
                error_log("Erreur lors la modification de la realisation/service $nom " . $error->getMessage());
                throw $error;
            }
        }

        // Permet de desactiver un réalisation où une service
        public function desactivate($id, $deletedBy)
        {
            $sql = "UPDATE servicereas
                    SET etat = 0, deleted_at = NOW(), deleted_by = :deleted_by WHERE id = :id ";
            try {
                $statement = $this->db->prepare($sql);
                $statement->execute([ 'deleted_by' => $deletedBy,'id' => $id]);
                $rowAffected = $statement->rowCount();
                return $rowAffected > 0; // True Si $rowAffected > 0
            } catch (PDOException $error) {
                error_log("Erreur lors la desactivation de la realisation/service d/id $id  " . $error->getMessage());
                throw $error;
            }
        }

        // Permet d'activer un réalisation où une service
        public function activate($id, $updatedBy)
        {
            $sql = "UPDATE servicereas
                    SET etat = 1, updated_at = NOW(), updated_by = :updated_by WHERE id = :id ";
            try {
                $statement = $this->db->prepare($sql);
                $statement->execute([ 'updated_by' => $updatedBy,'id' => $id]);
                $rowAffected = $statement->rowCount();
                return $rowAffected > 0; // True Si $rowAffected > 0
            } catch (PDOException $error) {
                error_log("Erreur lors l'activation de la realisation/service d/id $id  " . $error->getMessage());
                throw $error;
            }
        }

        // Permet de supprime devinitivement un service ou realisation 
        public function delete(int $id)
        {
            $sql = "DELETE * FROM servicereas WHERE id = :id";
            try {
                $statement = $this->db->prepare($sql);
                $statement->bindParam(':id', $id, PDO::PARAM_INT);
                $statement->execute();
                $result = $statement->fetch(PDO::FETCH_ASSOC);
                return $result ?: null;
            } catch (PDOException $error) {
                error_log("Erreur lors de la suppression de la realisation/service d'id $id" . $error->getMessage());
                throw $error;
            }
        }
    }
?>