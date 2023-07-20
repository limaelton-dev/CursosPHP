<?php
namespace app\controllers;

use app\controllers\Controller;
use app\support\Email;

class ContactController extends Controller 
{
    //essa função vai ser da view do formulário para enviar email
    function index()
    {
        $this->view('contact', ['title' => 'Contact']);
    }

    //para enviar o email
    function store()
    {
        $email = new Email;
        $email->from()
                ->to()
                ->template('contact')
                ->message()
                ->subject()
                ->send();
    }
}