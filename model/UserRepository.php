<?php
    require_once("DbRepository.php");
    
    class UserRepository extends DbRepository
    {

        // Permet de creer compte utilisateur
        public function register($nom, $adresse, $telephone, $photo, $email, $password, $role, $createdBy)
        {
            $sql = "INSERT INTO users (nom, adresse, telephone, photo, email, password, role, etat, created_at, created_by)
                    VALUES (:nom, :adresse, :telephone, :photo, :email, :password, :role, default, NOW(), :created_by) ";
            try {
                $statement = $this->db->prepare($sql);
                $hashPassword = password_hash($password, PASSWORD_DEFAULT);
                $statement->execute([
                    'nom' => $nom,
                    'adresse' => $adresse,
                    'telephone' => $telephone,
                    'photo' => $photo,
                    'email' => $email,
                    'password' => $password,
                    'role' => $role,
                    'created_by' => $createdBy
                ]);
                $lastInsertId = $this->db->lastInsertId();
                return $lastInsertId ?: null;
            } catch (PDOException $error) {
                error_log("Erreur lors de la creation du compte utilisateur " . $error->getMessage());
                throw $error;
            }
        }

        // Permet d'authentifier un utulisateur
        public function login($email, $password)
        {
            $sql = "SELECT * FROM users WHERE email = :email AND etat = 1";
            try {
                $statement = $this->db->prepare($sql);
                $statement->execute(['email' => $email]);
                $user = $statement->fetch(PDO::FETCH_ASSOC);

                if ($user && password_verify($password, $user['password'])) {
                    return $user;
                }
                 return false;
            } catch (PDOException $error) {
                error_log("Erreur lors de la connexion de l'utulisateur " . $error->getMessage());
                throw $error;
            }
        }
    }
?>