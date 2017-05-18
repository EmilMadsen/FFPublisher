<?php

function getFromApi($partUrl)
{

    $url = 'http://kaempe.club/publisher' . $partUrl;

    $options = array(
        'http' => array(
            'method'  => 'GET',
            'header'=>
                "Content-Type: application/json\r\n" .
                "Accept: application/json\r\n" .
                "Authorization: " . $_SESSION['auth_token'] ."\r\n"
        )
    );

    $context  = stream_context_create( $options );
    $result = file_get_contents( $url, false, $context );
    $wrapper = json_decode( $result, true );

    return $wrapper;
}


function postToApi($partUrl, $data)
{
    $url = 'http://kaempe.club/publisher' . $partUrl;

    $options = array(
        'http' => array(
            'method'  => 'POST',
            'content' => $data,
            'header'=>
                "Content-Type: application/json\r\n" .
                "Accept: application/json\r\n" .
                "Authorization: " . $_SESSION['auth_token'] ."\r\n"
        )
    );

    $context  = stream_context_create( $options );
    $result = file_get_contents( $url, false, $context );
    $response = json_decode( $result );

    return $response;
}