<?php require_once './app/views/_global/beforeContent.php'; ?>


<li class="nav-item">
    <a  class="nav-link" href="<?php echo Configuration::BASE_URL ?>usluge/" id="active2"><h6>Uređivanje sadržaja</h6><span class="sr-only">(current)</span></a>
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
<main class="container" id="ukloni">
    <div class="row">
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
    