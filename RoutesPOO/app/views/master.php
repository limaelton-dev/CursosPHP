<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$this->e($title)?></title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <?= $this->section('css'); ?>
</head>
<body>
    <div class="container">
        <?php $this->insert('partials/header') ?>

        <?=$this->section('content')?>
    </div>
    <?= $this->section('js'); //nome da pasta em public ?>

</body>
</html>