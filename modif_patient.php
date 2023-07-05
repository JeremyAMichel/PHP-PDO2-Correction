<?php
include_once('./partials/header.php');
include_once('./utils/db_connect.php');

$patientsStmnt = $pdo->prepare('SELECT * FROM patients WHERE id = ' . $_GET['patient_id']);
$patientsStmnt->execute();
$patient = $patientsStmnt->fetch(PDO::FETCH_ASSOC);
?>

<main>
    <?php include './utils/alert.php' ?>
    <section>
        <form action="./process/process_modif_patient.php?patient_id=<?= $patient['id'] ?>" method="post">
            <input value='<?= $patient['lastname'] ?>' type="text" placeholder="Karfa" name="lastname" id="">
            <input value='<?= $patient['firstname'] ?>' type="text" placeholder="Hamza" name="firstname" id="">
            <input value='<?= $patient['phone'] ?>' type="tel" placeholder="0612457821" name="phone" id="">
            <input value='<?= $patient['mail'] ?>' type="email" placeholder="example@mail.com" name="mail" id="">
            <input value='<?= $patient['birthdate'] ?>' type="text" placeholder="2022-12-04" class="datepicker" name="birthdate">
            <button type="submit" class="btn">Modifier</button>
        </form>
    </section>
</main>

<script src="./assets/js/ajout_patient.js"></script>

<?php include_once('./partials/footer.php') ?>