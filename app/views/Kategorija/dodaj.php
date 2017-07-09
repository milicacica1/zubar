<?php require_once './app/views/_global/beforeContent.php'; ?>

<article class="container">
    <h2>Dodavanje nove kategorije usluga</h2>
    <form method="post" action="<?php echo Configuration::BASE_URL; ?>kategorija/dodaj/" id='form1'>
        <div class="form-group row">
            <label class="col-2 col-form-label">Naziv nove kategorije:</label>
            <div class="col-10">
                <input type="text" name="kategorija" required class="form-control" pattern="^[A-Z][a-z]+( [a-z]+)*" title="Naziv kategorije mora poceti velikim slovom!">
            </div>
        </div>
        
        <button type="submit" class="btn btn-success">Dodajte kategoriju</button>
    </form>
    <?php if (isset($DATA['poruka'])): ?>
        <p><?php echo htmlspecialchars($DATA['poruka']); ?></p>   


    <?php endif; ?>
</article>
<?php require_once 'app/views/_global/afterContent.php'; ?>


