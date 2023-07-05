<?php
include_once('./partials/header.php');
include_once('./utils/db_connect.php');

$patientsStmnt = $pdo->prepare('SELECT appointments.id, appointments.dateHour, appointments.idPatients, patients.lastname, patients.firstname FROM appointments JOIN patients ON patients.id = appointments.idPatients');
$patientsStmnt->execute();
$appointments = $patientsStmnt->fetchAll(PDO::FETCH_ASSOC);
?>
<main>
    <?php include_once('./utils/alert.php') ?>
    <section>

        <table>
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Firstname</th>
                    <th>Lastname</th>
                    <th>dateHour</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($appointments as $appointment) { ?>
                    <tr>
                        <td><?= $appointment['id'] ?></td>
                        <td><?= $appointment['firstname'] ?></td>
                        <td><?= $appointment['lastname'] ?></td>
                        <td><?= $appointment['dateHour'] ?></td>

                        <td>
                            <a class="btn" href="./detail_patient.php?patient_id=<?= $appointment['idPatients'] ?>">Voir</a>
                            <a class="btn blue" href="./modif_rdv.php?rdv_id=<?= $appointment['idPatients'] ?>">Modifier</a>
                            <a class="btn red" href="./process/process_suppr_patient.php?rdv_id=<?= $appointment['idPatients'] ?>">Supprimer</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </section>
</main>

<script src="./assets/js/ajout_patient.js"></script>

<?php include_once('./partials/footer.php') ?>