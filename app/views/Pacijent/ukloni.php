<?php require_once './app/views/_global/beforeContent.php'; ?>

<li class="nav-item">
    <a aria-pressed="true" class="nav-link" href="<?php echo Configuration::BASE_URL ?>usluge/"><h6>Uređivanje sadržaja</h6><span class="sr-only">(current)</span></a>
</li>
<li class="nav-item">
    <a aria-pressed="true" class="nav-link" href="<?php echo Configuration::BASE_URL ?>pacijenti/" id="active2"><h6>Elektronski kartoni pacijenata</h5><span class="sr-only">(current)</span></a>
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
<article class="col-12 text-center">
<header>
    <h3 class="mb-5">Da li želite da uklonite pacijenta "<?php echo htmlspecialchars($DATA['pacijent']->ime);  echo ' '; echo htmlspecialchars($DATA['pacijent']->prezime);?>"?</h3>
</header>
<form method="post" action="<?php echo Configuration::BASE_URL; ?>pacijent/ukloni/<?php echo $DATA['pacijent']->pacijent_id ?>" id='form' class="col-12 text-center">
    <input type="hidden" name="confirmed" value="1">
    <button type="submit" class="btn btn-danger">Ukloni pacijenta</button>
    <a href="<?php echo Configuration::BASE_URL; ?>pacijenti/" class="btn btn-warning">Odustani</a>
</form>
<?php if (isset($DATA['poruka'])): ?>
    <p><?php echo htmlspecialchars($DATA['poruka']); ?></p>   


<?php endif; ?>
</article>
<?php require_once 'app/views/_global/afterContent.php'; ?>
