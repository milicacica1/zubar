<?php require_once './app/views/_global/beforeContent.php'; ?>


<li class="nav-item">
    <a class="nav-link" href="<?php echo Configuration::BASE_URL ?>usluge/" id="active2"><h6>Uređivanje sadržaja</h6><span class="sr-only">(current)</span></a>
</li>
<li class="nav-item">
    <a class="nav-link" href="<?php echo Configuration::BASE_URL ?>pacijenti/" ><h6>Elektronski kartoni pacijenata</h6><span class="sr-only">(current)</span></a>
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

        <table class="table table-bordered table-striped table-responsive col-12 col-md-12 col-lg-12">
            <thead>
                <tr>
                    <th class="text-center">Naziv</th>
                    <th class="text-center"><a href='<?php echo Configuration::BASE_URL; ?>kategorija/dodaj/' class="btn btn-success">Dodaj kategoriju &#10010;</a></th>
                </tr>

            </thead>
            <tbody>

                <?php
                $temp = $DATA['kategorije'];
                if (is_array($temp))
                    foreach ($temp as $kategorija):
                        ?>
                        <tr>
                            <th scope="row">
                                <?php echo $kategorija->vrsta; ?><br>

                            </th>
                            <td class="text-nowrap">
                                <a href="<?php echo Configuration::BASE_URL; ?>kategorija/izmeni/<?php echo htmlspecialchars($kategorija->kategorija_id); ?>" class="btn btn-warning">Izmeni</a>
                                <a href="<?php echo Configuration::BASE_URL; ?>kategorija/ukloni/<?php echo htmlspecialchars($kategorija->kategorija_id); ?>" class="btn btn-danger">Ukloni</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
            </tbody>
        </table>
        <a href="<?php echo Configuration::BASE_URL; ?>usluge/" class="btn btn-outline-warning">Povratak na usluge</a>
        <?php require_once 'app/views/_global/afterContent.php'; ?>