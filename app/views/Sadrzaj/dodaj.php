<?php require_once './app/views/_global/beforeContent.php'; ?>

<article class="container">
    <h2>Dodavanje nove usluge zubara</h2>
    <form method="post" action="<?php echo Configuration::BASE_URL; ?>usluga/dodaj/" id='form1'>
        <div class="form-group row">
            <label class="col-2 col-form-label">Kataloski broj:</label>
            <div class="col-10">
                <input type="text" name="kataloski_broj" id="f1_kataloski_broj" required class="form-control" pattern="^[A-Z]{2}[0-9]{4}" title="Prva dva karaktera kataloskog broja moraju biti slova a ostale četiri cifre brojevi!">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-2 col-form-label">Naziv:</label>
            <div class="col-10">
                <input type="text" name="naziv" id="f1_name" required class="form-control">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-2 col-form-label">Opis:</label>
            <div class="col-10">
                <textarea name="opis" id="f1_opis" required class="form-control"></textarea>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-2 col-form-label">Cena:</label>
            <div class="col-10">
                <input type="number" min="1.00" step="1.0" max="2500" name="cena" id="f1_cena" required class="form-control">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-2 col-form-label">Cena sa popustom:</label>
            <div class="col-10">
                <input type="number" min="1.00" step="1.0" max="2500" name="cena_sa_popustom" id="f1_cena" required class="form-control">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-2 col-form-label">Kategorija:</label><br>
            <div class="col-10">

                <?php foreach ($DATA['kategorija'] as $kategorija): ?>               
                    <input type="radio" name="kategorija" value="<?php echo $kategorija->kategorija_id; ?>" > <?php echo htmlspecialchars($kategorija->vrsta); ?><br>
                <?php endforeach; ?>
            </div>
        </div>
        <button type="submit" class="btn btn-success">Dodajte uslugu</button>
    </form>
    <?php if (isset($DATA['poruka'])): ?>
        <p><?php echo htmlspecialchars($DATA['poruka']); ?></p>   


    <?php endif; ?>
</article>
<?php require_once 'app/views/_global/afterContent.php'; ?>


