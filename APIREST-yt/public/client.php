<?php

    $url = 'http://localhost:8092/APIREST-yt/public/api/';

    $class = '/user';
    $param = '/1';

    $response = file_get_contents($url.$class.$param);
    echo $response;

    //
    $response = json_decode($response, 1);

    // var_dump($response);