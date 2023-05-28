<?php
include_once('conexao.php');
?>

<?php
$id = $_GET['id'];


    $sql = "SELECT * FROM usuarios WHERE id = :id";
    $stmt = $PDO->prepare($sql);
    $stmt->bindValue(':id', $id);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if (isset($_POST['atualizar'])) {
    
        $nome = $_POST['nome'];
        $endereco = $_POST['endereco'];
        $bairro = $_POST['bairro'];
        $cep = $_POST['cep'];
        $cidade= $_POST['cidade'];
        $estado = $_POST['estado'];
    
    
        $sql = "UPDATE usuarios SET nome = :nome, endereco = :endereco, bairro = :bairro, cep = :cep, cidade = :cidade, estado = :estado WHERE id = :id";
        $stmt = $PDO->prepare($sql);
        $stmt->bindValue(':nome', $nome);
        $stmt->bindValue(':endereco', $endereco);
        $stmt->bindValue(':bairro', $bairro);
        $stmt->bindValue(':cep', $cep);
        $stmt->bindValue(':cidade', $cidade);
        $stmt->bindValue(':estado', $estado);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
    
        if ($stmt->rowCount() > 0) {

        } else {
            echo "Erro ao atualizar os dados.";
        }
    
        header("Location: consultar.php");
        exit();
    }
    

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="style.css">
  <title>Formulário</title>
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
    <div class="itens">
      <form  method="POST" action="">
                  <h2>Cadastrar - Agendamento de Potencias Clientes</h2>
                  <p>Sistema utilizado para agendamento de serviços.</p>
                  <div class="mb-3">
                      <label for="nome" class="form-label">Nome:</label>
                      <input type="text" class="form-control" name="nome" value="<?php echo $row['nome']; ?>" id="nome">
                  </div>
                  <div class="mb-3">
                      <label for="endereco" class="form-label">Endereço:</label>
                      <input type="text" class="form-control" name="endereco" value="<?php echo $row['endereco']; ?>" id="endereco">
                  </div>
                  <div class="mb-3">
                      <label for="bairro" class="form-label">Bairro:</label>
                      <input type="text" class="form-control" name="bairro" value="<?php echo $row['bairro']; ?>" id="bairro">
                  </div>
                  <div class="mb-3">
                      <label for="cep" class="form-label">CEP:</label>
                      <input type="text" class="form-control" name="cep" value="<?php echo $row['cep']; ?>" id="cep">
                  </div>
                  <div class="mb-3">
                      <label for="cidade" class="form-label">Cidade:</label>
                      <input type="text" class="form-control" name="cidade" value="<?php echo $row['cidade']; ?>" id="cidade">
                  </div>
                  <div class="mb-3">
                  <label for="select" class="form-label">Estado:</label>
                  <select class="form-select" aria-label="select" name="estado" value="<?php echo $row['estado']; ?>" id="estado">
                        <option value="AC">AC</option>
                        <option value="AL">AL</option>
                        <option value="AP">AP</option>
                        <option value="AM">AM</option>
                        <option value="BA">BA</option>
                        <option value="CE">CE</option>
                        <option value="DF">DF</option>
                        <option value="ES">ES</option>
                        <option value="GO">GO</option>
                        <option value="MA">MA</option>
                        <option value="MT">MT</option>
                        <option value="MS">MS</option>
                        <option value="MG">MG</option>
                        <option value="PA">PA</option>
                        <option value="PB">PB</option>
                        <option value="PR">PR</option>
                        <option value="PE">PE</option>
                        <option value="PI">PI</option>
                        <option value="RJ">RJ</option>
                        <option value="RN">RN</option>
                        <option value="RS">RS</option>
                        <option value="RO">RO</option>
                        <option value="RR">RR</option>
                        <option value="SC">SC</option>
                        <option value="SP">SP</option>
                        <option value="SE">SE</option>
                        <option value="TO">TO</option>
                  </select>
                  </div>
                  <div class="mb-3">
                      <input  class="btn btn-primary" type="submit" value="Atualizar" name="atualizar" id="atualizar">
                  </div>
      </form>        
      </div>  
    </div>
</body>
</html>
