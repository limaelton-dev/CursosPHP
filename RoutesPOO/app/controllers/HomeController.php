<?php
namespace app\controllers;

class HomeController extends Controller
{
    function index() 
    {
        $this->view('home', ['title' => 'Olá']);    
    }
}