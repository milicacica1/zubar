<?php require_once './app/views/_global/beforeContent.php'; ?>

<article class="col-12 text-center">
    <header>
        <h3 class="mb-5">Da li želite da uklonite uslugu "<?php echo htmlspecialchars($DATA['usluge']->naziv) ?>" iz kataloga usluga?</h3>
    </header>
    <form method="post" action="<?php echo Configuration::BASE_URL; ?>usluga/ukloni/<?php echo $DATA['usluge']->usluga_id ?>" id='form1'>
        <input type="hidden" name="confirmed" value="1">
        <button type="submit" class="btn btn-danger">Ukloni uslugu</button>
        <a href="<?php echo Configuration::BASE_URL; ?>usluge" class="btn btn-warning">Odustani</a>
    </form>
    <?php if (isset($DATA['poruka'])): ?>
        <p><?php echo htmlspecialchars($DATA['poruka']); ?></p>   


    <?php endif; ?>
</article>
<?php require_once 'app/views/_global/afterContent.php'; ?>
    