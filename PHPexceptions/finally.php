<?php
//Finally: por mais que não caia no catch, ele executa o finally

function a():int
{
    try{
        echo "Código";
        throw new Exception();
        return 0; //se não cair na excessão ele para de executar a função
    } catch(Throwable $e){
        echo "Problema";
        return 1; //Se cair na excessão ele para de excutar aqui
    } finally{
        echo "Final da função";
    }
    echo "Final da função"; //essa linha nunca será alcançada, mas como ela está no finally, aí sim ela será executada;
}



//O finally obriga a execução do código;