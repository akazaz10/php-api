<?php

// tienen próximos títulos - a la fecha del commit
const API_URL_MARVEL = "https://whenisthenextmcufilm.com/api";
const API_URL_DC = "https://www.whenisthenextmcufilm.com/api?list_id=8563041";


// no tienen próximos títulos - a la fecha del commit
const API_URL_STWARS = "https://www.whenisthenextmcufilm.com/api?list_id=8563040";
const API_URL_BM = "https://www.whenisthenextmcufilm.com/api?list_id=8563043";
const API_URL_SP = "https://www.whenisthenextmcufilm.com/api?list_id=8635684";


// 1ra llamada: Marvel

$ch_marvel = curl_init(API_URL_MARVEL);
curl_setopt($ch_marvel, CURLOPT_RETURNTRANSFER, true);
$result_marvel = curl_exec($ch_marvel);
$data_marvel = json_decode($result_marvel, true);


// 2da llamada: Star_Wars

$ch_starwars = curl_init(API_URL_STWARS);
curl_setopt($ch_starwars, CURLOPT_RETURNTRANSFER, true);
$result_starwars = curl_exec($ch_starwars);
$data_starwars = json_decode($result_starwars, true);


// 3ra llamada: DC


$ch_dc = curl_init(API_URL_DC);
curl_setopt($ch_dc, CURLOPT_RETURNTRANSFER, true);
$result_dc = curl_exec($ch_dc);
$data_dc = json_decode($result_dc, true);

// 4ta llamada: MR Batman


$ch_batman = curl_init(API_URL_BM);
curl_setopt($ch_batman, CURLOPT_RETURNTRANSFER, true);
$result_batman = curl_exec($ch_batman);
$data_batman = json_decode($result_batman, true);

// 5ta llamada: SP 

$ch_sp = curl_init(API_URL_SP);
curl_setopt($ch_sp, CURLOPT_RETURNTRANSFER, true);
$result_sp = curl_exec($ch_sp);
$data_sp = json_decode($result_sp, true);





?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="La próxima película de Marvel">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>¿Siguiente?</title>
    <link rel="stylesheet" href="./index.css?v=<?= filemtime('index.css') ?>">
    <!-- <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.classless.min.css"
    > -->

</head>
<body>
    <!-- <pre style="font-size: 12.5px; overflow: scroll; height: 250px;">
        <?php var_dump($data_marvel); ?>
    </pre>
    <br>
    <pre style="font-size: 12.5px; overflow: scroll; height: 250px;">
        <?php var_dump($data_batman); ?>
    </pre>
    <br>
    <pre style="font-size: 12.5px; overflow: scroll; height: 250px;">
        <?php var_dump($data_dc); ?>
    </pre>
    <br>
    <pre style="font-size: 12.5px; overflow: scroll; height: 250px;">
        <?php var_dump($data_starwars); ?>
    </pre>
    <br>
    <pre style="font-size: 12.5px; overflow: scroll; height: 250px;">
        <?php var_dump($data_sp); ?>
    </pre> -->
  

    <header>
        <h1>CARTELERA - PRÓXIMOS ESTRENOS</h1>
        <p> </p>
    </header>

    <main>

        <div class="container"></div>


        <div class="movies">

            <p class="text"><strong>Películas más esperadas</strong></p>

            

            

            <div class="card marvel">
                <img 
                    src="<?= $data_marvel["poster_url"] ?>" 
                    alt="poster de <?= $data_marvel["title"] ?>"
                >

                <hgroup>
                    <h3><?= $data_marvel["title"] ?> se estrena en <?= $data_marvel["days_until"] ?> días.</h3>
                    <br>
                    <p>La siguiente en estrenarse es: <strong> <?= $data_marvel["following_production"]["title"] ?? "No anunciada" ?> </strong></p>
                </hgroup>
            </div>

            <div class="card dc">

                <img 
                    src="<?= $data_dc["poster_url"] ?>" 
                    alt="poster de <?= $data_dc["title"] ?>"
                >

                <hgroup>
                    <h3><?= $data_dc["title"] ?> se estrena en <?= $data_dc["days_until"] ?> días.</h3>
                    <br>
                    <p>La siguiente en estrenarse es: <strong> <?= $data_dc["following_production"]["title"] ?? "No anunciada" ?> </strong></p>
                </hgroup>

            </div>

            <div class="card batman">

                <img 
                    src="<?= $data_batman["poster_url"] ?>" 
                    alt="poster de <?= $data_batman["title"] ?>"
                >

                <hgroup>
                    <h3><?= $data_batman["title"] ?> se estrena en <?= $data_batman["days_until"] ?> días.</h3>
                    <br>
                    <p>La siguiente en estrenarse es: <strong> <?= $data_batman["following_production"]["title"] ?? "No anunciada" ?> </strong></p>
                </hgroup>

            </div>

            <div class="card sp">

                <img 
                    src="<?= $data_sp["poster_url"] ?>" 
                    alt="poster de <?= $data_sp["title"] ?>"
                >

                <hgroup>
                    <h3><?= $data_sp["title"] ?> se estrena en <?= $data_sp["days_until"] ?> días.</h3>
                    <br>
                    <p>La siguiente en estrenarse es: <strong> <?= $data_sp["following_production"]["title"] ?? "No anunciada"  ?> </strong></p>
                </hgroup>

            </div>

            <div class="card starwars">

                <img 
                    src="<?= $data_starwars["poster_url"] ?>" 
                    alt="poster de <?= $data_starwars["title"] ?>"
                >

                <hgroup>
                    <h3><?= $data_starwars["title"] ?> se estrena en <?= $data_starwars["days_until"] ?> días.</h3>
                    <br>
                    <p>La siguiente en estrenarse es: <strong> <?= $data_starwars["following_production"]["title"] ?? "No anunciada" ?> </strong></p>
                </hgroup>

            </div>

            

        </div>

    </main>

    <footer>
        <h3>© Todos los derechos reservados... los izquierdos también.</h3>
    </footer>


</body>
</html>
