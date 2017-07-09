<?php require_once './app/views/_global/beforeContent.php'; ?>

<article class="container">
    <h2>Dodavanje novog pacijenta</h2>
    <form method="post" action="<?php echo Configuration::BASE_URL; ?>pacijent/dodaj/" id="form1"  enctype="multipart/form-data">
        <div class="form-group row">
            <label class="col-2 col-form-label">Ime:</label>
            <div class="col-10">
                <input type="text" name="ime" id="f1_ime" required class="form-control" pattern="[A-Z][a-z]+" title="Ime pacijenta mora početi veliki slovom!">
            </div>
        </div>
        <div class="form-group row"">
            <label class="col-2 col-form-label">Prezime:</label>
            <div class="col-10">
                <input type="text" name="prezime" id="f1_prezime" required class="form-control"  pattern="[A-Z][a-z]+(-[A-Z][a-z]+)*" title="Prezime pacijenta mora početi veliki slovom!">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-2 col-form-label">E-mail:</label>
            <div class="col-10">
                <input type="email" name="email" id="f1_email" required class="form-control" >
            </div>
        </div>
        <div class="form-group row">
            <label class="col-2 col-form-label">JMBG:</label> 
            <div class="col-10">
                <input type="text" name="jmbg" id="f1_jmbg" required class="form-control" pattern="[0-9]{13}" title="JMBG mora biti broj od tačno trinaest cifara!">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-2 col-form-label">Datum rodjenja:</label>
            <div class="col-10">
                <input type="date" name="datum_rodjenja" id="example-date-input" required class="form-control" >
            </div>
        </div>
        <div class="form-group row">
            <label class="col-2 col-form-label">Telefon:</label>
            <div class="col-10">
                <input type="tel" name="telefon" id="f1_telefon" required class="form-control" >
            </div>
        </div>
        <div class="form-group row">
            <label class="col-2 col-form-label">Alergije:</label>
            <div class="col-10">
                <input type="text" name="alergije" id="f1_alergije" required class="form-control" >
            </div>
        </div>
        <div class="form-group row">
            <label class="col-2 col-form-label">Kategorija:</label><br>
            <div class="col-10">
                <input type="radio" name="kategorija" value="odrsli">Odrasla osoba<br>
                <input type="radio" name="kategorija" value="dete">Dete<br>
                <input type="radio" name="kategorija" value="penzioner">Penzioner<br>
                <input type="radio" name="kategorija" value="student">Student<br>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-2 col-form-label">Izaberite sliku:</label>
            <div class="col-10">
                <input type="file"  name="fileToUpload" id="fileToUpload">
            </div>
        </div>

        <button type="submit" class="btn btn-success">Dodajte pacijenta</button>
        <a href = "<?php echo Configuration::BASE_URL;?>pacijenti/" class="btn btn-warning">Odustani</a>
    </form>
    <?php if (isset($DATA['poruka'])): ?>
        <p><?php echo htmlspecialchars($DATA['poruka']); ?></p>   


    <?php endif; ?>
</article>
<?php require_once 'app/views/_global/afterContent.php'; ?>


