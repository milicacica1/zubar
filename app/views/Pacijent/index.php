<?php require_once './app/views/_global/beforeContent.php'; ?>

<li class="nav-item">
    <a aria-pressed="true" class="nav-link" href="<?php echo Configuration::BASE_URL ?>usluge/"><h6>Uređivanje sadržaja</h6><span class="sr-only">(current)</span></a>
</li>
<li class="nav-item">
    <a aria-pressed="true" class="nav-link" href="<?php echo Configuration::BASE_URL ?>pacijenti/" id="active2"><h6>Elektronski kartoni pacijenata</h6><span class="sr-only">(current)</span></a>
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

<h1 id="naslov" class="mr-auto">Svi pacijenti</h1>


<a href="<?php echo Configuration::BASE_URL; ?>pacijent/dodaj" class="btn btn-lg btn-outline-success btn-block mb-5"> Dodaj pacijenta &#10010;</a>

<div class="row col-12">

<?php


if (is_array($DATA['pacijentitogzubara']))
    foreach ($DATA['pacijentitogzubara'] as $pacijent):
        //col-12 col-sm-12 col-md-6 col-lg-12   
        ?>
        
        <article class="col-12 col-sm-12 col-md-6 col-lg-4">

            <div class="thumbnail bord">
                <img  class="img img-thumbnail" alt="profilSlika"  src="<?php echo Configuration::BASE_URL; ?>assets/img/profil/<?php echo $pacijent->pacijent_id ?>.jpg"> 
                <div class="caption">
                    <h3 class="ime"><?php
                        echo $pacijent->ime;
                        echo ' ';
                        echo $pacijent->prezime
                        ?></h3>
                    <section class="row"><h5 class="space">Datum rodjenja:</h5><?php echo htmlspecialchars($pacijent->datum_rodjenja);?></section>
                    <section class="row"><h5 class="space">E-mail: </h5><?php echo htmlspecialchars($pacijent->email);?></section>
                    <section class="row"><h5 class="space">Broj telefona: </h5><?php echo htmlspecialchars($pacijent->telefon);?></section>
                    <section class="row"><h5 class="space">JMBG: </h5><?php echo htmlspecialchars($pacijent->jmbg);?></section>
                    <section class="row"><h5 class="space">Alergije: </h5><?php echo htmlspecialchars($pacijent->alergije);?></section>
                    <section class="row"><h5 class="space">Kategorija pacijenta: </h5><?php echo htmlspecialchars($pacijent->kategorija_pacijenta);?></section>
                    <div class="text-center mt-4">
                        
                        <a href="<?php echo Configuration::BASE_URL; ?>pregled/<?php echo $pacijent->pacijent_id ?>" class="btn btn-success  mr-3" role="button">Pregled</a> 
                        <a href="<?php echo Configuration::BASE_URL; ?>pacijent/izmeni/<?php echo $pacijent->pacijent_id ?>" class="btn btn-warning  mr-3" role="button">Izmeni</a>
                        <a href="<?php echo Configuration::BASE_URL; ?>pacijent/ukloni/<?php echo $pacijent->pacijent_id ?>" class="btn btn-danger" role="button">&#10006;</a>
                    </div>
                </div>
            </div>

        </article>
        
    <?php endforeach; ?>

</div>


<?php require_once 'app/views/_global/afterContent.php'; ?>

