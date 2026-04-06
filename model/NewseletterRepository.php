<?php
    require_once("DbRepository.php");
    
    class NewseletterRepository extends DbRepository
    {
        // Recuperer la liste des User
        public function getAll()
        {
            $sql = "SELECT * FROM newsletters";

            try {
                return $this->db->query($sql)->fetchAll(PDO::FETCH_ASSOC);

            } catch (PDOException $error) {
                error_log("Erreur lors de la recuperation des Newseletters" . $error->getMessage());
                throw $error;
            }
        }

        // Recuperer un  newseletter email via son ID
        public function getByEmail($email)
        {
            $sql = "SELECT * FROM users WHERE email = :email";
            try {
                $statement = $this->db->prepare($sql);
                $statement->execute(['email' => $email]);

                return $statement->fetch(PDO::FETCH_ASSOC) ?: null;
                
            } catch (PDOException $error) {
                error_log("Erreur lors de la recuperation de la newseletter email $email" . $error->getMessage());
                throw $error;
            }
        }

        // Permet d'ajouter un newseletter
        public function add($email)
        {
            $sql = "INSERT INTO newsletters (email, created_at)
                    VALUES (:email, NOW()) ";
            try {
                $statement = $this->db->prepare($sql);
                $statement->execute([
                    'email' => $email,
                ]);
                $lastInsertId = $this->db->lastInsertId();
                return $lastInsertId ?: null;
            } catch (PDOException $error) {
                error_log("Erreur lors de l'ajout de la newsletter" . $error->getMessage());
                throw $error;
            }
        }
    }
?>