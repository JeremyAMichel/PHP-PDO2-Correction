<?php include_once('./partials/header.php') ?>
<?php include_once('./utils/db_connect.php') ?>
<?php 

    if (isset($_GET['search']) && !empty($_GET['search'])) {
        $patientsStmnt = $pdo->prepare('SELECT * FROM patients WHERE firstname LIKE ?');
        $patientsStmnt->execute(['%'.$_GET['search'].'%']);
    } else {
        $patientsStmnt = $pdo->prepare('SELECT * FROM patients');
        $patientsStmnt->execute();
    }
    
    
    
    $patients = $patientsStmnt->fetchAll(PDO::FETCH_ASSOC);

?>
<main>
    <form action="" method="get">
        <input type="text" name="search" placeholder="Rechercher par firstname">
        <button type="submit" class="btn" >Rechercher</button>
    </form>

    <?php include_once('./utils/alert.php') ?>
    <section>
   
    <table>
        <thead>
          <tr>
              <th>Id</th>
              <th>Firstname</th>
              <th>Lastname</th>
              <th>Mail</th>
              <th>Phone</th>
              <th>Birthdate</th>
              <th>Actions</th>
          </tr>
        </thead>

        <tbody>
            <?php foreach ($patients as $patient) {?>
                <tr>
                    <td><?=$patient['id']?></td>
                    <td><?=$patient['firstname']?></td>
                    <td><?=$patient['lastname']?></td>
                    <td><?=$patient['mail']?></td>
                    <td><?=$patient['phone']?></td>
                    <td><?=$patient['birthdate']?></td>
                    <td>
                        <a class="btn" href="./detail_patient.php?patient_id=<?=$patient['id']?>">Voir</a>
                        <a class="btn blue" href="./modif_patient.php?patient_id=<?=$patient['id']?>">Modifier</a>
                        <a class="btn red" href="./process/process_suppr_patient.php?patient_id=<?=$patient['id']?>">Supprimer</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
      </table>
    </section>
</main>

<script src="./assets/js/ajout_patient.js"></script>

<?php include_once('./partials/footer.php') ?>