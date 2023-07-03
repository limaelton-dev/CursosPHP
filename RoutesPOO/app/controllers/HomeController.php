<?php
namespace app\controllers;

use app\database\Filters;
use app\database\models\User;

class HomeController extends Controller
{
    function index() 
    {
        $filters = new Filters;
        
        $filters->where('id', '>', 50);
        $filters->limit(5);
        $filters->orderBy('id', 'desc');

        $user = new User;
        $user->setFilters($filters);
        $usersFound = $user->fetchAll(); 

        dd($usersFound);

        //$filters->dump();


        $this->view('home', ['title' => 'Home']);    
    }
}