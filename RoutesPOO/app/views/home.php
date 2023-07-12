<?php $this->layout('master', ['title' => $title]) ?>

<h1>Home(<?= $pagination->getTotal() ;?>)</h1>

<h2>Itens por página: <?= $pagination->getPerPage() ?></h2>

<ul>
    <?php foreach ($users as $user) : ?>
        <li> <?php echo $user->firstName; ?></li>
    <?php endforeach; ?>
</ul>

<?= $pagination->links(); ?>