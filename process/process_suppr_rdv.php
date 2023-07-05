<?php
if (
    isset($_GET['rdv_id']) && !empty($_GET['rdv_id'])
) {
    //connexion bdd 
    include '../utils/db_connect.php';
    // faire la requete
    $pdostmnt = $pdo->prepare('DELETE FROM appointments WHERE id = ?');
    $isSuccess =  $pdostmnt->execute([
        $_GET['rdv_id']
    ]);

    if ($isSuccess) {
        header('Location: ../liste_rdv.php?&success=Le patient à bien été supprimé !');    
    } else {
        header('Location: ../liste_rdv.php?error=La suppression a échouée');    
    }
    //rediriger vers une page
} else {
    header('Location: ../liste_rdv.php?error=Je ne sais pas qui supprimer');    
}