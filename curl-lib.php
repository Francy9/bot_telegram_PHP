<?php
// Semplice libreria per le creazione di richieste HTTP

function http_request($url) {
    $handle = curl_init($url);
    if($handle == false) {
        die("Ops, cURL non funziona\n");
    }

    curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($handle, CURLOPT_HEADER,0);
       
    

    // Esecuzione della richiesta, $response = contenuto della risposta testuale
    $response = curl_exec($handle);
    
    curl_close($handle);
    $status = curl_getinfo($handle, CURLINFO_HTTP_CODE);
    if($status != 200) {
        die("Richiesta HTTP fallita, status {$status}\n");
    }

    // Decodifica della risposta JSON
    return $response;
}
