<?php
 
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $conn = db_connect(); 


    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM Utilisateur WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(1, $email);
    $stmt->execute();
    $user = $stmt->fetch();
 

    if ($user && password_verify($password, $user['mot_de_passe'])) {
        $_SESSION['user_id'] = $user['id_utilisateur']; // Sauvegarde l'ID utilisateur dans la session
        $_SESSION['user_name'] = $user['nom']; // (Facultatif) Sauvegarde le nom de l'utilisateur
        header("Location: index.php?page=accueil");
        exit();
    } else {
        $error = "Email ou mot de passe incorrect.";
        header("Location: index.php?page=login&error=" . urlencode($error));
        exit();
    }
}
?>
