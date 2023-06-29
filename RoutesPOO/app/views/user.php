<?php $this->layout('master', ['title' => $title]) ?>

<h1>User</h1>


<form action="/user/update/12" method="post">

    <input type="text" name="firstName" id="firstName" value="Elton">
    <input type="text" name="lastName" id="lastName" value="Lima">
    <input type="email" name="email" id="email" value="elton@gmail.com">
    <input type="password" name="password" id="password" value="1234">

    <button type="submit">Atualizar</button>
</form>


