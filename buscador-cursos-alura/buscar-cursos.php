<?php

require 'vendor/autoload.php';

use Alura\BuscadorDeCursos\Buscador;
use GuzzleHttp\Client;
use Symfony\Component\DomCrawler\Crawler;


$client = new Client(
    ['base_uri' => 'https://www.alura.com.br/', 
    'verify' => false
    ]
); //Instancio o client. o Verify => false, conserta o erro de desconhecer o Guzzle
$crawler = new Crawler();

$buscador = new Buscador($client, $crawler);
$cursos = $buscador->buscar('/cursos-online-programacao/php');


foreach ($cursos as $curso) { //Faço um loop em cada um dos cursos, com o curso
    echo $curso . PHP_EOL;  
}