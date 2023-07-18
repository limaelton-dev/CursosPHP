<?php $this->layout('master', ['title' => $title]) ?>

<h1>User</h1>


<form action="/user/update" method="post">
    <?= flash('created'); ?>

    <?= getToken(); ?>
    
    <?= flash('firstName', 'color: red'); ?>
    <input type="text" name="firstName" id="firstName" value="Elton">

    <?= flash('lastName', 'color: red'); ?>
    <input type="text" name="lastName" id="lastName" value="Lima">

    <?= flash('email', 'color: red'); ?>
    <input type="email" name="email" id="email" value="elton@gmail.com">
    
    <?= flash('password', 'color: red'); ?>
    <input type="password" name="password" id="password" value="1234">

    <button type="submit">Atualizar</button>
</form>


