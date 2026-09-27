<?php


const API_URL = "https://whenisthenextmcufilm.com/api";

# Inicializaremos una nueva sesión de cURL; ch = cURL handle

$ch = curl_init(API_URL);

// Indicamos que queremos recibir el resultado de la petición y no mostrarla en pantalla

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

/* 
    Ejecutamos la  petición
    y guardamos los resultados
*/

$result = curl_exec($ch);



// Una alternativa sería utilizar file_get_contents
// $result = file_get_contents(API_URL);  ----> Solo sí quieres hacer un GET de una API


/* Transformamos el json del resultado */

$data = json_decode($result, true);

// curl_close($ch);



?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="La próxima película de Marvel">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>¿Siguiente?</title>
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.classless.min.css"
    >

    <style>
        :root {
            color-scheme: light dark;
        }

        body {
            display: flex;
            flex-direction: column;
            justify-content: center;
            height: 100vh;
        }

        img {
            margin: 0 auto;
        }

        section {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        hgroup {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
    </style>

</head>
<body>
    <!-- <pre style="font-size: 12.5px; overflow: scroll; height: 250px;">
        <?php var_dump($data); ?>
    </pre> -->
    <main>

        <section>
            <img 
                src="<?= $data["poster_url"] ?>" 
                alt="poster de <?= $data["title"] ?>" 
                width="300"
                style="border-radius: 16px;"
            >
        </section>

        <hgroup>
            <h3><?= $data["title"] ?> se estrena en <?= $data["days_until"] ?> días</h3>
            <p>Fecha de estreno: <?=  $data["release_date"] ?> </p>

            <p>La siguiente es <?= $data["following_production"]["title"] ?></p>
        </hgroup>

    </main>
</body>
</html>



