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


?>
