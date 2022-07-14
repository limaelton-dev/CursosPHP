<?php
    $notasb1 = [
        'Maria' => 8,
        'Joao' => 5,
        'Ana' => 9,
        'Elton' => 10,
    ];
    
    $notasb2 = [
        'Maria' => 7,
        'Ana' => 6,
        'Elton' => 10,
    ];
    
    var_dump(array_diff_key($notasb1 , $notasb2)); //consigo verificar qual está em um e não está no outro, posso tirar o "key", assim ficando array_diff()
    //nessa função ele vê qual tem no primeiro que não tem nos outros
    //var_dump(array_diff_assoc($notasb1 , $notasb2));
    //saduapsoduuisdhfishdfasduahsdiuh
 ?>