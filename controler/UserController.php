<?php
classe Contrôleur d'utilisateur {
    privé $modèle;

    publique fonction __construction($modèle) {
        $ce->modèle=$modèle;
    }

    publique fonction registre($nom d'utilisateur,$e-mail,$mot de passe) {
        si($ce->modèle->s'inscrireUtilisateur($nom d'utilisateur,$e-mail,$mot de passe)) {
            en-tête('Emplacement : index.php?page=login&success=1');
        }autre{
            en-tête('Emplacement : index.php?page=register&error=1');
        }
    }

    publique fonction se connecter($e-mail,$mot de passe) {
        $utilisateur=$ce->modèle->loginUtilisateur($e-mail,$mot de passe);
        si($utilisateur) {
            début_session();
            $_SESSION['utilisateur'] =$utilisateur;
            en-tête('Emplacement : index.php?page=dashboard');
        }autre{
            en-tête('Emplacement : index.php?page=login&error=1');
        }
    }
}