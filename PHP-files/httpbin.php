<?php
//httpbin.org é uma api de testes, onde ela devolve as informações enviadas

$contexto = stream_context_create([     //criando o contexto
    'http' => [         //o tipo de wrapper, ou protocolo
        'method' => 'POST' ,          //o metodo que vai ser utilizado
        'headers' => "X=From: PHP\r\nContent-Type: text/plain",      //cabeçalho, mas não entendi muito bem o valor dele. Tipo é texto puro
        'content' => 'Teste do corpo'
   
     ]

]); 

echo file_get_contents('http://httpbin.org/post', false, $contexto);//padrão o segundo parâmetro falso