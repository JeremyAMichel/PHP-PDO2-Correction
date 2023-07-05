<?php include_once('./partials/header.php') ?>
<?php include_once('./utils/db_connect.php') ?>
<?php 
    $patientsStmnt = $pdo->prepare('SELECT * FROM patients');
    $patientsStmnt->execute();
    $patients = $patientsStmnt->fetchAll(PDO::FETCH_ASSOC);
?>
<main>
    <?php include_once('./utils/alert.php') ?>
    <section>
        <form action="./process/process_ajout_rdv.php" method="post">
            <input type="datetime-local" name="dateHour" id="">
            <select name='patient'>
                <option value="" disabled selected>Choose your option</option>
                <?php foreach ($patients as $patient) { ?>
                    <option value="<?=$patient['id']?>" ><?=$patient['lastname']?> <?=$patient['firstname']?></option> <? //  <?=  correspond à faire <?php echo ?>
                <?php }?>
            </select>
            <label>Materialize Select</label>
            <button type="submit" class="btn" >Ajouter</button>
        </form>
    </section>
</main>

<script src="./assets/js/ajout_patient.js"></script>

<?php include_once('./partials/footer.php') ?>