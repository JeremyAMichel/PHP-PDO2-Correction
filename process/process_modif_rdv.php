<?php
if (
    isset($_POST['dateHour']) && !empty($_POST['dateHour']) &&
    isset($_POST['patient']) && !empty($_POST['patient']) &&
    isset($_GET['rdv_id']) && !empty($_GET['rdv_id'])
) {
    //connexion bdd 
    include '../utils/db_connect.php';
    // faire la requete
    $pdostmnt = $pdo->prepare('UPDATE appointments SET dateHour=?, idPatients=? WHERE id = ?');
    $isSuccess =  $pdostmnt->execute([
        $_POST['dateHour'],
        $_POST['patient'],
        $_GET['rdv_id'],
    ]);

    if ($isSuccess) {
        header('Location: ../liste_rdv.php?success=Le rendez vous à bien été modifié !');    
    } else {
        header('Location: ../modif_rdv.php?error=Erreur lors de la modification du rendez vous !');    
    }
    
    //rediriger vers une page
} else {
    header('Location: ../modif_rdv.php?error=Le formulaire n\'est pas valide !');    
}