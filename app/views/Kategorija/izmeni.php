<?php require_once './app/views/_global/beforeContent.php'; ?>

<article class="container">
    <h2>Izmena podataka o kategoriji</h2>
    <form method="post" action="<?php echo Configuration::BASE_URL; ?>kategorija/izmeni/<?php echo $DATA['kategorija']->kategorija_id ?>" id='form1'>
        <div class="form-group row">
            <label  class="col-2 col-form-label">Ime:</label>
            <div class="col-10">
                <input type="text" name="kategorija" id="f1_ime" required class="form-control" pattern="^[A-Z][a-z]+( [a-z]+)*" title="Naziziv kategorije mora poceti velikim slovom!" value="<?php echo $DATA['kategorija']->vrsta ?>">
            </div>
        </div>
        <button type="submit" class="btn btn-success">Sacuvajte nove vrednosti</button>
        <a href = "<?php echo Configuration::BASE_URL;?>kategorije" class="btn btn-warning">Odustani</a>
    </form>
    
    <?php if (isset($DATA['poruka'])): ?>
        <p><?php echo htmlspecialchars($DATA['poruka']); ?></p>   


    <?php endif; ?>
</article>
<?php require_once 'app/views/_global/afterContent.php'; ?>
