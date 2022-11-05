<?php

namespace Alura\BuscadorDeCursos;

use GuzzleHttp\ClientInterface;
use Symfony\Component\DomCrawler\Crawler;

class Buscador
{
    private $httpClient;
    private $crawler;
    public function __construct(ClientInterface $httpClient, Crawler $crawler)
    {
        $this->httpClient = $httpClient;
        $this->crawler = $crawler;
    }

    public function buscar(string $url): array
    {
        $resposta = $this->httpClient->request('GET', $url); //Puxo o client http, com os dados da url passada

        $html = $resposta->getBody(); //Apenas recupero esses dados e do "Corpo" e salvo em uma variável
        $this->crawler->addHtmlContent($html); //Defino o html aqui, mas poderia definir no próprio new Crawler($html)

        $elementosCursos = $this->crawler->filter('span.card-curso__nome');
         //Aqui eu inspecionei o HTML do site, e verifiquei que queria os itens que estavam em span..., e filtrei eles
        $cursos = [];

        foreach ($elementosCursos as $elemento) {
            $cursos[] = $elemento->textContent;
        }
        return $cursos;
    }
}
