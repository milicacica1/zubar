<?php require_once './app/views/_global/adminBeforeContent.php'; ?>

<article class="col-12 text-center" id="ukloni">
    <header>
        <h3 class="mb-5">Da li želite da uklonite zubara "<?php echo htmlspecialchars($DATA['zubar']->ime);  echo ' '; echo htmlspecialchars($DATA['zubar']->prezime); echo '" sa username-om: "'; echo htmlspecialchars($DATA['zubar']->username);?>"?</h3>
    </header>
    <form method="post" action="<?php echo Configuration::BASE_URL; ?>admin/ukloni/<?php echo $DATA['zubar']->zubar_id ?>" id='form' class="col-12 text-center">
        <input type="hidden" name="confirmed" value="1">
        <button type="submit" class="btn btn-danger">Ukloni zubara</button>
        <a href="<?php echo Configuration::BASE_URL; ?>admin/" class="btn btn-warning">Odustani</a>
    </form>
    <?php if (isset($DATA['poruka'])): ?>
        <p><?php echo htmlspecialchars($DATA['poruka']); ?></p>   


    <?php endif; ?>
</article>
<?php require_once 'app/views/_global/adminAfterContent.php'; ?>
    