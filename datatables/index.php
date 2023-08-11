<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paginação</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">

</head>
<body>
    <h1>Listar Usuários</h1>
    <table id="listar-usuario" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Id</th>
                <th>First name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Password</th>
            </tr>
        </thead>
    </table>

    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready(function() {
            new DataTable('#listar-usuario', {
                ajax: 'listar_usuarios.php',
                processing: true,
                serverSide: true
            });
        });
    </script>
</body>
</html>