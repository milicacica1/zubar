<?php require_once './app/views/_global/beforeContent.php'; ?>


<li class="nav-item">
    <a aria-pressed="true" class="nav-link" href="<?php echo Configuration::BASE_URL ?>usluge/" id="active2"><h6>Uređivanje sadržaja</h6><span class="sr-only">(current)</span></a>
</li>
<li class="nav-item">
    <a aria-pressed="true" class="nav-link" href="<?php echo Configuration::BASE_URL ?>pacijenti/" ><h6>Elektronski kartoni pacijenata</h6><span class="sr-only">(current)</span></a>
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
                <a href = "<?php echo Configuration::BASE_URL; ?>kategorije" class="btn btn-warning">Odustani</a>
            </form>

            <?php if (isset($DATA['poruka'])): ?>
                <p><?php echo htmlspecialchars($DATA['poruka']); ?></p>   


            <?php endif; ?>
        </article>
        <?php require_once 'app/views/_global/afterContent.php'; ?>


