<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$this->e($title)?></title>
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