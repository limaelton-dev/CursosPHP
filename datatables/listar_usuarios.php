<?php

require_once 'conexao.php';

//para receber os dados do ajax
$dados_requisicao = $_REQUEST;

var_dump($dados_requisicao);


//querys...
$query_qtd_users = "SELECT COUNT(id) AS qtd_users FROM users";

$result_qtd_users = $conn->prepare($query_qtd_users);
$result_qtd_users->execute();
$row_qtd_users = $result_qtd_users->fetch(PDO::FETCH_ASSOC);
// var_dump($row_qtd_users);

$query_users = "SELECT id, firstName, lastName, email, password 
                FROM users
                ORDER BY id DESC
                LIMIT :inicio , :quantidade";

$result_users = $conn->prepare($query_users);
$result_users->bindParam(':inicio', $dados_requisicao['start'], PDO::PARAM_INT); //start e length são padrões do datatables
$result_users->bindParam(':quantidade', $dados_requisicao['length'], PDO::PARAM_INT);
$result_users->execute();

//aqui vou preencher o array $dados conforme a necessidade do DataTables
while($row_usuario = $result_users->fetch(PDO::FETCH_ASSOC)) {
    // var_dump($row_usuario);
    extract($row_usuario);
    $registro = [];
    //$id é a chave do array $row_usuario, pois usei o extract()
    $registro[] = $id;
    $registro[] = $firstName;
    $registro[] = $lastName;
    $registro[] = $email;
    $registro[] = $password;

    $dados[] = $registro;
    
}

// var_dump($dados);
//Criar o objeto de informações a serem retornadas para o JS
$resultado = [
    "draw" => intval($dados_requisicao['draw']),     //para cada requisição e enviado um número como parâmetro
    "recordsTotal" => intval($row_qtd_users['qtd_users']), //utilizo o ALIAS do DB
    "recordsFiltered" => intval($row_qtd_users['qtd_users']), //total de registros no "pesquisar"
    "data" => $dados
];

// var_dump($resultado);

//retornar o obj json para o JS
echo json_encode($resultado);
