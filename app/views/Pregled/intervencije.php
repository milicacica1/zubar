<?php require_once './app/views/_global/beforeContent.php'; ?>
<li class="nav-item">
    <a aria-pressed="true" class="nav-link" href="<?php echo Configuration::BASE_URL ?>usluge/"><h6>Uređivanje sadržaja</h6><span class="sr-only">(current)</span></a>
</li>
<li class="nav-item">
    <a aria-pressed="true" class="nav-link" href="<?php echo Configuration::BASE_URL ?>pacijenti/" ><h6>Elektronski kartoni pacijenata</h6><span class="sr-only">(current)</span></a>
</li>

<li class="nav-item">
    <a aria-pressed="true" class="nav-link" href="<?php echo Configuration::BASE_URL ?>intervencije/" id="active2"><h6>Pogledaj sve intervencije</h6><span class="sr-only">(current)</span></a>
</li>

</ul>


<a class="btn btn-outline-danger " href="<?php echo Configuration::BASE_URL; ?>logout/" id="odjava"><span class="align-bottom">Odjava sa sistema</span></a>


</div>
</nav>
</div>
</header>
<main class="container">
    <div class="row">

        <table class="table table-bordered table-striped table-responsive col-12 col-md-12 col-lg-12" id="tableheight2">
    <thead>
        <tr>
            <th class="text-center">Pacijent</th>
            <th class="text-center">Email</th>
            <th class="text-center">JMBG</th>
            <th class="text-center">Kataloski broj</th>
            <th class="text-center">Kategorija</th>
            <th class="text-center">Intervencija</th>
            <th class="text-center">Zub</th>
            <th class="text-center">Cena</th>
            <th class="text-center">Vreme</th>
        </tr>
    </thead>
    <tbody>
        
        <?php
            foreach ($DATA['intervencije'] as $intervencija):
                ?>
                <tr>
                    <th scope="row">
                        <?php echo $intervencija->ime . ' ' . $intervencija->prezime;?><br>
                    </th>
                    <td class="text-center"><?php echo htmlspecialchars($intervencija->email); ?></td>
                    <td class="text-center"><?php echo htmlspecialchars($intervencija->jmbg); ?></td>
                    <td class="text-center"><?php echo htmlspecialchars($intervencija->kataloski_broj); ?></td>
                    <td class="text-center"><?php echo htmlspecialchars($intervencija->vrsta); ?></td>
                    <td class="text-center"><?php echo htmlspecialchars($intervencija->naziv); ?></td>
                    <td class="text-center"><?php echo htmlspecialchars($intervencija->zub); ?></td>
                    <?php
                           if($intervencija->kategorija_pacijenta=='odrasli'){
                               echo '<td class="text-center">' . htmlspecialchars($intervencija->cena) . '</td>';
                           }else{
                               echo '<td class="text-center">' . htmlspecialchars($intervencija->cena_sa_popustom) . '</td>';
                           }
                    ?>
                    <td class="text-center"><?php echo htmlspecialchars($intervencija->vreme); ?></td>
                    
                </tr>
            <?php endforeach; ?>
    </tbody>
</table>
<?php require_once './app/views/_global/afterContent.php'; ?>