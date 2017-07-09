<?php require_once './app/views/_global/beforeContent.php'; ?>


<table class="table table-bordered table-striped table-responsive col-12 col-md-9 col-lg-10" id="tableheight">
    <thead>
        <tr>
            <th class="text-center">Naziv</th>
            <th class="text-center" rowspan="2"><a href='<?php echo Configuration::BASE_URL;?>kategorija/dodaj/' class="btn btn-success">Dodaj kategoriju &#10010;</a></th>
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
                        <?php echo $kategorija->vrsta;?><br>
                        
                    </th>
                    <td class="text-nowrap">
                        <a href="<?php echo Configuration::BASE_URL;?>kategorija/izmeni/<?php echo htmlspecialchars($kategorija->kategorija_id);?>" class="btn btn-warning">Izmeni</a>
                        <a href="<?php echo Configuration::BASE_URL;?>kategorija/ukloni/<?php echo htmlspecialchars($kategorija->kategorija_id);?>" class="btn btn-danger">Ukloni</a>
                    </td>
                </tr>
            <?php endforeach; ?>
    </tbody>
</table>
<?php require_once 'app/views/_global/afterContent.php';?>