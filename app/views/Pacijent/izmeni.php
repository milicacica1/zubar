<?php require_once './app/views/_global/beforeContent.php'; ?>

<li class="nav-item">
    <a aria-pressed="true" class="nav-link" href="<?php echo Configuration::BASE_URL ?>usluge/"><h6>Uređivanje sadržaja</h6><span class="sr-only">(current)</span></a>
</li>
<li class="nav-item">
    <a aria-pressed="true" class="nav-link" href="<?php echo Configuration::BASE_URL ?>pacijenti/" id="active2"><h6>Elektronski kartoni pacijenata</h6><span class="sr-only">(current)</span></a>
</li>

<li class="nav-item">
    <a aria-pressed="true" class="nav-link" href="<?php echo Configuration::BASE_URL ?>intervencije/"><h6>Pogledaj sve intervencije</h6><span class="sr-only">(current)</span></a>
</li>

</ul>


<a class="btn btn-outline-danger " href="<?php echo Configuration::BASE_URL; ?>logout/" id="odjava"><span class="align-bottom">Odjava sa sistema</span></a>


</div>
</nav>
</div>
</header>
<main class="container">
    <div class="row">
<article class="container">
    <h2>Izmena podataka o pacijentu</h2>
    <form method="post" action="<?php echo Configuration::BASE_URL; ?>pacijent/izmeni/<?php echo $DATA['pacijent']->pacijent_id ?>" id='form1'>
        <div class="form-group row">
            <label  class="col-2 col-form-label">Ime:</label>
            <div class="col-10">
                <input type="text" name="ime" id="f1_ime" required class="form-control" pattern="[A-Z][a-z]+" title="Ime pacijenta mora početi veliki slovom!" value="<?php echo $DATA['pacijent']->ime ?>">
            </div>
        </div>
        <div class="form-group row">
            <label  class="col-2 col-form-label">Prezime:</label>
            <div class="col-10">
                <input type="text" name="prezime" id="f1_prezime" required class="form-control" pattern="[A-Z][a-z]+(-[A-Z][a-z]+)*" title="Prezime pacijenta mora početi veliki slovom!" value="<?php echo $DATA['pacijent']->prezime ?>">
            </div>
        </div>

        <div class="form-group row">
            <label class="col-2 col-form-label">E-mail:</label>
            <div class="col-10">
                <input type="email" name="email" id="f1_email" required class="form-control" value="<?php echo htmlspecialchars($DATA['pacijent']->email); ?>">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-2 col-form-label">JMBG:</label> 
            <div class="col-10">
                <input type="text" name="jmbg" id="f1_jmbg" required class="form-control" pattern="[0-9]{13}" title="JMBG mora biti broj od tačno trinaest cifara!" value="<?php echo htmlspecialchars($DATA['pacijent']->jmbg); ?>">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-2 col-form-label">Datum rodjenja:</label>
            <div class="col-10">
                <input type="date" name="datum_rodjenja" id="example-date-input" required class="form-control" value="<?php echo htmlspecialchars($DATA['pacijent']->datum_rodjenja); ?>" >
            </div>
        </div>
        <div class="form-group row">
            <label class="col-2 col-form-label">Telefon:</label>
            <div class="col-10">
                <input type="tel" name="telefon" id="f1_telefon" required class="form-control" value="<?php echo htmlspecialchars($DATA['pacijent']->telefon); ?>">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-2 col-form-label">Alergije:</label>
            <div class="col-10">
                <input type="text" name="alergije" id="f1_alergije" required class="form-control" value="<?php echo htmlspecialchars($DATA['pacijent']->alergije); ?>">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-2 col-form-label">Kategorija:</label><br>
            <div class="col-10">
                <input type="radio" name="kategorija" value="odrasli">Odrasla osoba<br>
                <input type="radio" name="kategorija" value="dete">Dete<br>
                <input type="radio" name="kategorija" value="penzioner">Penzioner<br>
                <input type="radio" name="kategorija" value="student">Student<br>
            </div>
        </div>
        <div class="form-group row  ">
            <label class="col-2 col-form-label">Izaberite sliku:</label>
            <div class="col-10">
                <input type="file" name="fileToUpload" id="fileToUpload">
            </div>
        </div>
        <button type="submit" class="btn btn-success">Sacuvajte nove vrednosti</button>
        <a href = "<?php echo Configuration::BASE_URL;?>pacijenti/" class="btn btn-warning">Odustani</a>
    </form>
    <?php if (isset($DATA['poruka'])): ?>
        <p><?php echo htmlspecialchars($DATA['poruka']); ?></p>   


    <?php endif; ?>
</article>
<?php require_once 'app/views/_global/afterContent.php'; ?>
