<?php

// Connexion à la base de données
 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $role = trim($_POST['role']);
    $hashed_password = password_hash($password, PASSWORD_BCRYPT);

    $conn = db_connect(); 
    // Vérifie si l'email existe déjà
    $sql_check = "SELECT id_utilisateur FROM Utilisateur WHERE email = ?";
    $stmt_check = $conn->prepare($sql_check);
    $stmt_check->bindParam(1, $email);
    $stmt_check->execute();
     
    if (isset($stmt_check->fetch()['id_utilisateur'])) {
        // Redirige avec un message d'erreur si l'email existe
        $error = "Cet email est déjà utilisé.";
        //header("Location: index.php?page=register&error=" . urlencode($error));
        exit();
    }

    // Insère le nouvel utilisateur
    $sql = "INSERT INTO Utilisateur (nom, email, mot_de_passe, role) VALUES (:username, :email, :password, :role)";
    
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':password', $hashed_password);
            $stmt->bindParam(':role', $role);
            
            if ($stmt->execute()) {
                // Rediriger l'utilisateur vers la page de connexion après l'inscription
                header("Location: login.php");
                exit; // Assurer que le script s'arrête après la redirection
            } else {
                $error = "Une erreur est survenue, veuillez réessayer.";
            }
}else {
    echo "erreur"; 
}
?>
