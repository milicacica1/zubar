<?php require_once './app/views/_global/beforeContent.php'; ?>

<li class="nav-item">
    <a class="nav-link" href="<?php echo Configuration::BASE_URL ?>usluge/"><h6>Uređivanje sadržaja</h6><span class="sr-only">(current)</span></a>
</li>
<li class="nav-item">
    <a class="nav-link" href="<?php echo Configuration::BASE_URL ?>pacijenti/" id="active2"><h6>Elektronski kartoni pacijenata</h6><span class="sr-only">(current)</span></a>
</li>

<li class="nav-item">
    <a class="nav-link" href="<?php echo Configuration::BASE_URL ?>intervencije/"><h6>Pogledaj sve intervencije</h6><span class="sr-only">(current)</span></a>
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

            <h3 class="text-center">Oznacite koje usluge su radjenje na pregledu:</h3>
            <div class="zubi col-12" id="tableheight2">
                <form method="post" action="<?php echo Configuration::BASE_URL; ?>izvrsi/racun/<?php echo $DATA['pacijent'] ?>">
                    <?php
                    foreach ($DATA['bla'] as $b):
                        echo '<label class="col-12 col-form-label mt-4 stil mb-4"><span class="velia ml-3" >  Zub - ' . $b . '</span></label>';
                        foreach ($DATA['pregledi'] as $pregled):
                            echo '<br>';
                            echo '<label class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" name = "check_List[]"  value="' . $b . '_' . $pregled->usluga_id . '">
                <span class="custom-control-indicator"></span>
                <span class="custom-control-description">' . $pregled->naziv . '</span>
               </label>';
                        endforeach;
                        echo '<br>';
                    endforeach;
                    ?>
                    <button type="submit" class="btn btn-primary razmak" >Potvrdi</button>
                </form>
            </div>
        </article>
        <a href = "<?php echo Configuration::BASE_URL; ?>pregled/<?php echo $DATA['pacijent'] ?>" class="btn btn-warning">Odustani</a>
<?php require_once './app/views/_global/afterContent.php'; ?>
