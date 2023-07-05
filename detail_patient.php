<?php
include_once('./partials/header.php');
include_once('./utils/db_connect.php');


$patientsStmnt = $pdo->prepare('SELECT * FROM patients WHERE id = ' . $_GET['patient_id']);
$patientsStmnt->execute();
$patient = $patientsStmnt->fetch(PDO::FETCH_ASSOC);



$appointementStmnt = $pdo->prepare('SELECT * FROM appointments WHERE idPatients = ' . $_GET['patient_id']);
$appointementStmnt->execute();
$appointements = $appointementStmnt->fetchAll(PDO::FETCH_ASSOC);
?>
<main>
    <?php include_once('./utils/alert.php') ?>
    <section>
        <h3>Detail patient</h3>

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
                <tr>
                    <td><?= $patient['id'] ?></td>
                    <td><?= $patient['firstname'] ?></td>
                    <td><?= $patient['lastname'] ?></td>
                    <td><?= $patient['mail'] ?></td>
                    <td><?= $patient['phone'] ?></td>
                    <td><?= $patient['birthdate'] ?></td>
                    <td>
                        <a class="btn blue" href="./modif_patient.php?patient_id=<?= $patient['id'] ?>">Modifier</a>
                        <a class="btn red" href="./process/process_suppr_patient.php?patient_id=<?= $patient['id'] ?>">Supprimer</a>
                    </td>
                </tr>
            </tbody>
        </table>
        <h3>Liste des rendez vous du patient</h3>
        <table>
            <thead>
                <tr>
                    <th>Id</th>
                    <th>dateHour</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($appointements as $appointement) { ?>
                    <tr>
                        <td><?= $appointement['id'] ?></td>
                        <td><?= $appointement['dateHour'] ?></td>
                        <td>
                            <a class="btn blue" href="./modif_patient.php?rdv_id=<?= $appointement['id'] ?>">Modifier</a>
                            <a class="btn red" href="./process/process_suppr_patient.php?rdv_id=<?= $appointement['id'] ?>">Supprimer</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </section>
</main>

<script src="./assets/js/ajout_patient.js"></script>

<?php include_once('./partials/footer.php') ?>