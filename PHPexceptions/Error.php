<?php
error_reporting(E_ALL);// faz com que apareça todos os tipos de erros nesse código

ini_set('log_errors', 1); //valor 1, significa ligado o log de erros;


echo @$variável; // exemplo de NOTICE, pois não existe essa variável ainda
//O PHP cria a variável e executa ela como valor NULL
//o @, faz com que oculte os erros, não deve ser usado
const CONSTANTEE = 'valor'; //Assim se define uma constante
define('CONSTANTE', 'valor'); //Assim se define uma constante


