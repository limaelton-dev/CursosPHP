<?php
namespace app\controllers;

use app\controllers\Controller;
use app\support\Email;
use app\support\Flash;
use app\support\Validate;

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
        $validate = new Validate;
        $validated = $validate->validate([
            'email' => 'email|required',
            'subject' => 'required',
            'message' => 'required'
        ]);

        if(!$validated) {
            return redirect('/contact');
        }

        $email = new Email;
        $sent = $email->from($validated['email'], 'Eltin teste')
                ->to(['eltonlima.contato@hotmail.com'])
                ->message($validated['message'])
                ->subject($validated['subejct'])
                ->send();

        if($sent) {
            Flash::set('sent_success', 'Email enviado com sucesso!');
            return redirect('/contact');
        }

        Flash::set('sent_error', 'O e-mail não foi enviado, tente novamente!');
        return redirect('/contact');
    }
}