<?php
namespace app\controllers;

use app\database\{Filters, Pagination};
use app\database\models\User;

class HomeController extends Controller
{
    function index() 
    {
        $filters = new Filters;
        //$filters->where('users.id', '>', 0);
        // $filters->join('teste', 'users.id', '=', 'teste.id_user');

        $pagination = new Pagination;
        $pagination->setItemsPerPage(3);


        $user = new User;
        $user->setFields('users.id, firstName');
        $user->setFilters($filters);
        $user->setPagination($pagination);
        $usersFound = $user->fetchAll(); 

         

        // dd($usersFound);

        // $created = $user->create([
        //     'firstName' => 'Tainara',
        //     'lastName' => 'Mainardes',
        //     'email' => 'tai@example.com',
        //     'password' => '123'
        // ]);

        // $updated = $user->update('id', 12, ['firstName' => 'Jessy', 'lastName' => 'Muller']);
        // dd($updated);

        $this->view('home', ['title' => 'Home', 'users' => $usersFound, 'pagination' => $pagination]);    
    }
}