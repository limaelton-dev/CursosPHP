<?php $this->layout('master', ['title' => $title]) ?>

<h1>Contato</h1>
<?= flash('sent_success', 'color: green'); ?>
<?= flash('sent_error', 'color: red'); ?>

<form action="/contact" method="post">
    <?= flash('email'); ?>
    <input type="text" name="email" id="" placeholder="email">
    <?= flash('subject'); ?>
    <input type="text" name="subject" id="" placeholder="Subject">
    <?= flash('message'); ?>
    <textarea name="message" id="" cols="30" rows="10"></textarea>

    <?= getToken(); ?>

    <button type="submit">Send</button>
</form>