<?php 

    // INICIALIZAMOS LA API
    // 1: Crear una constante con el valor de la URL de la API.
    const API_URL = "https://whenisthenextmcufilm.com/api";

     // 2: Inicializar una nueva sesion de CURL; ch = cURL handle.
    $ch = curl_init(API_URL);

    // 3: Indicar que queremos recibir el resultado de la petición y no mostrarla en pantalla.
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

    // 4: Ejecutar la petición y guardamos el resultado.
    $result = curl_exec($ch);
    // UNA ALTERNATIVA SERIA UTILIZAR file_get_contents
    // $result = file_get_contents (API_URL)
    $data = json_decode($result, true);

    curl_close($ch);

    
?>

    <head>
        <meta charset="UTF-8" />
        <title>La proxima pelicula de marvel</title>
        <meta name="description" content="La proxima pelicula de marvel" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.classless.min.css"
        >
    </head>


    <main>
        
        <section style="text-align: center;">
            <img class="stylesImg" src="<?= $data["poster_url"]; ?>" alt="Poster de <?= $dataTitle ?>" />
        </section>

        <hgroup>
            <h3> <?= $data["title"]; ?>  Se estrena en: <?= $data["days_until"]; ?> </h3>
            <p> Fecha de estreno: <?= $data["release_date"]; ?> </p>
            <p> Y </p>
            <p> La siguiente pelicula es: <?= $data["following_production"]["title"] ; ?> </p>

        </hgroup>

    </main>



<style>
    
    :root{
        color-scheme: light dark;
    }

    body {
        display: grid;
        place-content: center;
    }

    section {
        display: flex;
        justify-content: center;
    }

    .stylesImg {
        height: 300px;
        width: 300px;
        border-radius: 20px;
        object-fit: cover;
        text-align: center;

    }

    hgroup {
        display: flex;
        flex-direction: column;
        justify-content: center;
        text-align: center;
    }

    hgroup p{
        padding:20 20 5 20;
    }

</style>

