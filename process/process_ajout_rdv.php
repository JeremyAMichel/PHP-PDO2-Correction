<?php
if (
    isset($_POST['dateHour']) && !empty($_POST['dateHour']) &&
    isset($_POST['patient']) && !empty($_POST['patient'])
) {
    //connexion bdd 
    include '../utils/db_connect.php';
    // faire la requete
    $pdostmnt = $pdo->prepare('INSERT INTO appointments( dateHour, idPatients) VALUES (?,?)');
    $isSuccess =  $pdostmnt->execute([
        $_POST['dateHour'],
        $_POST['patient'],
    ]);

    if ($isSuccess) {
        header('Location: ../liste_patient.php?success=Le rendez vous à bien été ajouté !');    
    } else {
        header('Location: ../ajout_rdv.php?error=Erreur lors de l\'enregistrement du rendez vous !');    
    }
    
    //rediriger vers une page
} else {
    header('Location: ../ajout_rdv.php?error=Le formulaire n\'est pas valide !');    
}