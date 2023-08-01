<?php $this->layout('master', ['title' => $title]) ?>

<h1>Contato</h1>
<?= flash('sent_success', 'color: green'); ?>
<?= flash('sent_error', 'color: red'); ?>

<form action="/contact" method="post">
    <?= flash('email'); ?>
    <input type="text" name="email" id="" placeholder="email" value="elton@elton.com">
    <?= flash('subject'); ?>
    <input type="text" name="subject" id="" placeholder="Subject" value="subject fixo">
    <?= flash('message'); ?>
    <textarea name="message" id="" cols="30" rows="10">teste fixo</textarea>

    <?= getToken(); ?>

    <button type="submit">Send</button>
</form>