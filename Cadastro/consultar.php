<?php
define('MYSQL_HOST','localhost:3306');
define('MYSQL_USER','root');
define('MYSQL_PASSWORD','');
define('MYSQL_DB_NAME','cadastro');

try{

    $PDO = new PDO('mysql:host=' . MYSQL_HOST . ';dbname=' . MYSQL_DB_NAME, MYSQL_USER, MYSQL_PASSWORD);

}catch(PDOException $e){

    echo 'Erro ao conectar com o MySQL: ' . $e->getMessage();

}


if (isset($_POST['cadastrar'])) {

    $nome = $_POST['nome'];
    $endereco = $_POST['endereco'];
    $bairro = $_POST['bairro'];
    $cep = $_POST['cep'];
    $cidade= $_POST['cidade'];
    $estado = $_POST['estado'];


    $sql = "INSERT INTO usuarios (nome, endereco, bairro, cep, cidade, estado) VALUES (:nome, :endereco, :bairro, :cep, :cidade, :estado)";
    $stmt = $PDO->prepare($sql);


    $stmt->execute(['nome' => $nome, 'endereco' => $endereco, 'bairro' => $bairro, 'cep' => $cep, 'cidade' => $cidade, 'estado' => $estado]);


    if ($stmt->rowCount() > 0) {

    } else {
        echo "Erro ao inserir os dados.";
    }

    header("Location: consultar.php");
    exit();
}

$conexao = null;
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
    <title>PHP - Sistema de Acesso ao Banco de Dados</title>
</head>
<body>
<div class="container" id="container">
      <nav class="navbar navbar-expand-lg bg-body-tertiary, fundo" data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">SISTEMA WEB</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="cadastro.php">Cadastrar</a>
                </li>
                <li class="nav-item">
                <a class="nav-link active" href="consultar.php">Consultar</a>
                </li>
            </ul>
            </div>
        </div>
    </nav>
    <?php
        $sql = "SELECT * FROM usuarios";
        $resul = $PDO->query($sql);
        $rows = $resul->fetchAll();
        ?>
        <div class="itens">
        <h2>Consultar - Dados dos Clientes</h2>
        <div class="table-responsive">
        <table class="table">
            <thead class="table">
                <tr>
                <th scope="col">ID</th>
                <th scope="col">Nome</th>
                <th scope="col">Endereço</th>
                <th scope="col">Bairro</th>
                <th scope="col">CEP</th>
                <th scope="col">Cidade</th>
                <th scope="col">Estado</th>
                </tr>
            </thead>
            <tbody>
        <?php
            for($i = 0; $i< count($rows); $i++){?>
                <tr>
                <th scope="row"><?php echo $rows[$i]['id'] ?></th>
                <td><?php echo $rows[$i]['nome'] ?></td>
                <td><?php echo $rows[$i]['endereco'] ?></td>
                <td><?php echo $rows[$i]['bairro'] ?></td>
                <td><?php echo $rows[$i]['cep'] ?></td>
                <td><?php echo $rows[$i]['cidade'] ?></td>
                <td><?php echo $rows[$i]['estado'] ?></td>
                </tr>
       <?php }?>
            </tbody>
       </table>
        </div>
        </div>
        </div>

</body>
</html>