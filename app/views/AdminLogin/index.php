<?php require_once './app/views/_global/adminBeforeContent.php'; ?>


<h1 id="naslov" class="mr-auto mb-4" >Svi zubari</h1>


<a href="<?php echo Configuration::BASE_URL; ?>admin/dodaj" class="btn btn-lg btn-outline-success btn-block mb-3">Dodaj zubara &#10010;</a>

<table class="table table-bordered table-striped table-responsive col-12 col-md-9 col-lg-12">
    <thead>
        <tr>
            <th class="text-center">Ime</th>
            <th class="text-center">Prezime</th>
            <th class="text-center">Username</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $temp = $DATA['pacijenti'];
        if (is_array($temp))
            foreach ($temp as $pacijent):
                ?>
                <tr>
                    <th scope="row">
                        <?php echo htmlspecialchars($pacijent->ime); ?><br>
                    </th>
                    <td class="text-center"><?php echo htmlspecialchars($pacijent->prezime); ?></td>
                    <td class="text-center"><?php echo htmlspecialchars($pacijent->username); ?></td>
                    <td class="text-nowrap">
                        <a href="<?php echo Configuration::BASE_URL; ?>admin/izmeni/<?php echo htmlspecialchars($pacijent->zubar_id); ?>" class="btn btn-warning">Izmeni</a>
                        <a href="<?php echo Configuration::BASE_URL; ?>admin/ukloni/<?php echo htmlspecialchars($pacijent->zubar_id); ?>" class="btn btn-danger">Ukloni</a>
                    </td>
                </tr>
            <?php endforeach; ?>
    </tbody>
</table>
<?php require_once './app/views/_global/adminAfterContent.php'; ?>