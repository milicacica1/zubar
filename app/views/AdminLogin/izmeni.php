<?php require_once './app/views/_global/adminBeforeContent.php'; ?>


<article class="container">
    <h2>Izmena podataka o pacijentu</h2>
    <form method="post" action="<?php echo Configuration::BASE_URL; ?>admin/izmeni/<?php echo $DATA['zubar']->zubar_id ?>" id='form1'>
        <div class="form-group row">
            <label  class="col-2 col-form-label">Ime:</label>
            <div class="col-10">
                <input type="text" name="ime" id="f1_ime" required class="form-control" pattern="[A-Z][a-z]+" title="Ime pacijenta mora početi veliki slovom!" value="<?php echo $DATA['zubar']->ime ?>">
            </div>
        </div>
        <div class="form-group row">
            <label  class="col-2 col-form-label">Prezime:</label>
            <div class="col-10">
                <input type="text" name="prezime" id="f1_prezime" required class="form-control" pattern="[A-Z][a-z]+(-[A-Z][a-z]+)*" title="Prezime pacijenta mora početi veliki slovom!" value="<?php echo $DATA['zubar']->prezime ?>">
            </div>
        </div>

        <div class="form-group row">
            <label class="col-2 col-form-label">Username:</label>
            <div class="col-10">
                <input type="text" name="username" id="f1_email" required class="form-control" pattern="^[a-z]{4,}$" title="Username mora imati minimum 4 slova." value="<?php echo htmlspecialchars($DATA['zubar']->username); ?>">
            </div>
        </div>
        
        <button type="submit" class="btn btn-success">Sacuvajte nove vrednosti</button>
        <a href="<?php echo Configuration::BASE_URL; ?>admin/" class="btn btn-warning">Odustani</a>
    </form>
    
    <?php if (isset($DATA['poruka'])): ?>
        <p><?php echo htmlspecialchars($DATA['poruka']); ?></p>   


    <?php endif; ?>
</article>
<?php require_once './app/views/_global/adminAfterContent.php'; ?>