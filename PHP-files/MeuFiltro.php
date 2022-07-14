<?php

class MeuFiltro extends php_user_filter
{
    public $stream;
    public function onCreate(): bool
    {
        $this->stream = fopen('php://temp', 'w+');
        return $this->stream !== false;
    }

    public function filter($in, $out, &$consumed, $closing):int
    {

        $saida = '';
        while($bucket = stream_bucket_make_writeable($in)){   //enquanto eu conseguir usar esse stream ($in) em algo que eu posso manipular
            $linhas = explode(PHP_EOL, $bucket->data); //o pedaço do arquivo que estou selecionando. explode separa em um array, onde cada indice é uma linha


            foreach($linhas as $linha){ //para cada uma das linhas
                if(stripos($linha, 'parte') !== false){ //se eu encontrar a palavra 'parte', eu adiciono na saída essa linha
                    $saida .= "$linha". PHP_EOL;
                
                }
            }
       }

       $bucketSaida = stream_bucket_new($this->stream, $saida);
       stream_bucket_append($out, $bucketSaida);

       return PSFS_PASS_ON;

       
    }
}