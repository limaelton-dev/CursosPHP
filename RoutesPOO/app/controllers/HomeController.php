<?php
namespace app\controllers;

use app\database\Filters;
use app\database\models\User;

class HomeController extends Controller
{
    function index() 
    {
        $filters = new Filters;
        $filters->where('id', '>', 2);
        // $filters->where('firstName', '=', 'João');

        $user = new User;
        $user->setFilters($filters);
        $userFound = $user->count(); 

         

        dd($userFound);

        //$filters->dump();


        $this->view('home', ['title' => 'Home']);    
    }
}