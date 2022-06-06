<?php

function verificarToken($token, $claveSecreta)
{
    $url = "https://www.google.com/recaptcha/api/siteverify";
    $datos = [
        "secret" => $claveSecreta,
        "response" => $token,
    ];
    $opciones = array(
        "http" => array(
            "header" => "Content-type: application/x-www-form-urlencoded\r\n",
            "method" => "POST",
            "content" => http_build_query($datos),
        ),
    );
    $contexto = stream_context_create($opciones);
    $resultado = file_get_contents($url, false, $contexto);
    if ($resultado === false) {
        
        return false;
    }
    $resultado = json_decode($resultado);
    $pruebaPasada = $resultado->success;
    return $pruebaPasada;
}