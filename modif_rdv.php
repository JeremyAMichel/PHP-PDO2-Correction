<?php 
include_once('./partials/header.php');
include_once('./utils/db_connect.php');

$patientsStmnt = $pdo->prepare('SELECT * FROM patients');
$patientsStmnt->execute();
$patients = $patientsStmnt->fetchAll(PDO::FETCH_ASSOC);

$appointmentStmnt = $pdo->prepare('SELECT * FROM appointments WHERE id = ?');
$appointmentStmnt->execute([$_GET['rdv_id']]);
$appointment = $appointmentStmnt->fetch(PDO::FETCH_ASSOC);
?>
<main>
    <?php include_once('./utils/alert.php') ?>
    <section>
        <form action="./process/process_modif_rdv.php?rdv_id=<?= $appointment['id'] ?>" method="post">
            <input type="datetime-local" name="dateHour" value='<?= str_replace(' ', 'T', $appointment['dateHour']) ?>' id="">
            <select name='patient'>
                <option value="" disabled>Choose your option</option>
                <?php foreach ($patients as $patient) { ?>
                    <option <?= $patient['id'] == $appointment['idPatients'] ? 'selected' : '' ?> value="<?= $patient['id'] ?>"><?= $patient['lastname'] ?> <?= $patient['firstname'] ?></option>
                <?php } ?>
            </select>
            <label>Materialize Select</label>
            <button type="submit" class="btn">Modifier</button>
        </form>
    </section>
</main>

<script src="./assets/js/ajout_patient.js"></script>

<?php include_once('./partials/footer.php') ?>