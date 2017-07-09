<?php require_once './app/views/_global/beforeContent.php'; ?>

<article class="container">
    <h3>IZMENA USLUGA ZUBARA</h3>
    <form method="post" action="<?php echo Configuration::BASE_URL; ?>usluga/izmeni/<?php echo htmlspecialchars($DATA['usluge']->usluga_id);?>" id='form1'>
        <div class="form-group row">
            <label class="col-2 col-form-label">Kataloski broj:</label>
            <div class="col-10">
                <input type="text" name="kataloski_broj" id="f1_kataloski_broj" required class="form-control" pattern="^[A-Z]{2}[0-9]{4}" title="Prva dva karaktera kataloskog broja moraju biti slova a ostale četiri cifre brojevi!" value="<?php echo htmlspecialchars($DATA['usluge']->kataloski_broj); ?>">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-2 col-form-label">Naziv:</label>
            <div class="col-10">
                <input type="text" name="naziv" id="f1_name" required class="form-control"  value="<?php echo htmlspecialchars($DATA['usluge']->naziv);?>">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-2 col-form-label">Opis:</label>
            <div class="col-10">
                <textarea name="opis" id="f1_opis" required class="form-control"><?php echo htmlspecialchars($DATA['usluge']->opis); ?></textarea>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-2 col-form-label">Cena:</label>
            <div class="col-10">
                <input type="number" min="1.00" step="1.0" max="2500" name="cena" id="f1_cena" required class="form-control" value="<?php echo htmlspecialchars($DATA['usluge']->cena); ?>">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-2 col-form-label">Cena sa popustom:</label>
            <div class="col-10">
                <input type="number" min="1.00" step="1.0" max="2500" name="cena_sa_popustom" id="f1_cena" required class="form-control" value="<?php echo htmlspecialchars($DATA['usluge']->cena_sa_popustom); ?>">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-2 col-form-label">Kategorija:</label><br>
            <div class="col-10">
                <?php foreach ($DATA['kategorija'] as $kategorija): ?>

                    <?php if ($kategorija->kategorija_id == $DATA['usluge']->kategorija_id) { ?>
                        <input type="radio" name="kategorija" value="<?php echo htmlspecialchars($DATA['usluge']->kategorija_id); ?>" checked> <?php echo htmlspecialchars($kategorija->vrsta); ?><br>
                        <?php
                        continue;
                    }
                    ?>
                    <input type="radio" name="kategorija" value="<?php echo htmlspecialchars($kategorija->kategorija_id); ?>"> <?php echo htmlspecialchars($kategorija->vrsta); ?><br>
                <?php endforeach; ?>
            </div>
        </div>
        <button type="submit" class="btn btn-success">Sacuvajte nove vrednosti</button>

    </form>
    <?php if (isset($DATA['poruka'])): ?>
        <p><?php echo htmlspecialchars($DATA['poruka']); ?></p>   


    <?php endif; ?>
</article>
<?php require_once 'app/views/_global/afterContent.php'; ?>
