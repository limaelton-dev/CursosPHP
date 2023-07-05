<?php
namespace app\controllers;

use app\database\Filters;
use app\database\models\User;

class HomeController extends Controller
{
    function index() 
    {
        $filters = new Filters;
        $filters->where('users.id', '<', 2);
        $filters->join('teste', 'users.id', '=', 'teste.id_user');

        $user = new User;
        $user->setFields('users.id, firstName, carro');
        $user->setFilters($filters);
        $userFound = $user->fetchAll(); 

         

        dd($userFound);

        //$filters->dump();


        $this->view('home', ['title' => 'Home']);    
    }
}