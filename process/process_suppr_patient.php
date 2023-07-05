<?php
if (
    isset($_GET['patient_id']) && !empty($_GET['patient_id'])
) {
    //connexion bdd 
    include '../utils/db_connect.php';
    // faire la requete
    $pdostmnt = $pdo->prepare('DELETE FROM patients WHERE id = ?');
    $isSuccess =  $pdostmnt->execute([
        $_GET['patient_id']
    ]);

    if ($isSuccess) {
        header('Location: ../liste_patient.php?&success=Le patient à bien été supprimé !');    
    } else {
        header('Location: ../liste_patient.php?error=La suppression a échouée');    
    }
    //rediriger vers une page
} else {
    header('Location: ../liste_patient.php?error=Je ne sais pas qui supprimer');    
}