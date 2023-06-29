<?php
namespace app\controllers;

use app\database\Filters;
use app\database\models\User;

class HomeController extends Controller
{
    function index() 
    {
        $filters = new Filters;
        
        $filters->where('id', '>', 50, 'and');
        $filters->where('firstName', 'like', "%xandecar%", 'or');
        $filters->where('id', 'IN', [1,3,8]);

        $filters->dump();


        $this->view('home', ['title' => 'Home']);    
    }
}