<?php require_once './app/views/_global/beforeContent.php'; ?>


<li class="nav-item">
    <a class="nav-link" href="<?php echo Configuration::BASE_URL ?>usluge/" id="active2"><h6>Uređivanje sadržaja</h6><span class="sr-only">(current)</span></a>
</li>
<li class="nav-item">
    <a  class="nav-link" href="<?php echo Configuration::BASE_URL ?>pacijenti/" ><h6>Elektronski kartoni pacijenata</h6><span class="sr-only">(current)</span></a>
</li>

<li class="nav-item">
    <a  class="nav-link" href="<?php echo Configuration::BASE_URL ?>intervencije/"><h6>Pogledaj sve intervencije</h6><span class="sr-only">(current)</span></a>
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
                        <input type="number" min="1.00" step="1.0" max="2500" name="cena" required class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-2 col-form-label">Cena sa popustom:</label>
                    <div class="col-10">
                        <input type="number" min="1.00" step="1.0" max="2500" name="cena_sa_popustom" required class="form-control">
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
                <a href = "<?php echo Configuration::BASE_URL; ?>usluge/" class="btn btn-warning">Odustani</a>
            </form>
            <?php if (isset($DATA['poruka'])): ?>
                <p><?php echo htmlspecialchars($DATA['poruka']); ?></p>   


            <?php endif; ?>
        </article>
        <?php require_once 'app/views/_global/afterContent.php'; ?>


