<?php require_once './app/views/_global/beforeContent.php'; ?>

<article class="col-12 text-center">
<header>
    <h3 class="mb-5">Da li želite da uklonite kategoriju "<?php echo htmlspecialchars($DATA['kategorija']->vrsta);?>"?</h3>
</header>
<form method="post" action="<?php echo Configuration::BASE_URL; ?>kategorija/ukloni/<?php echo $DATA['kategorija']->kategorija_id ?>" id='form' class="col-12 text-center">
    <input type="hidden" name="confirmed" value="1">
    <button type="submit" class="btn btn-danger">Ukloni kategoriju</button>
    <a href = "<?php echo Configuration::BASE_URL;?>kategorije" class="btn btn-warning">Odustani</a>
</form>
<?php if (isset($DATA['poruka'])): ?>
    <p><?php echo htmlspecialchars($DATA['poruka']); ?></p>   


<?php endif; ?>
</article>
<?php require_once 'app/views/_global/afterContent.php'; ?>
