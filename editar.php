<?php include 'servidor.php'; ?>

<?php
$id = '';
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $sql = "SELECT * FROM equipa WHERE ID = $id";
    $resultado = mysqli_query($ligacao, $sql);

    if (mysqli_num_rows($resultado) == 1) {
        $linha = mysqli_fetch_assoc($resultado);
    } else {
        echo "<br> Jogador não encontrado <br>";
        exit();
    }
} else {
    echo "<br> ID não especificado <br>";
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = intval($_POST['id']);
    $nome = mysqli_real_escape_string($ligacao, $_POST['nome']);
    $idade = intval($_POST['idade']);
    $numero = intval($_POST['numero']);
    $posicao = mysqli_real_escape_string($ligacao, $_POST['posicao']);
    $nacionalidade = mysqli_real_escape_string($ligacao, $_POST['nacionalidade']);

    $sql = "UPDATE equipa SET Nome = '$nome', Idade = $idade, `Nª` = $numero, Posicao = '$posicao', Nacionalidade = '$nacionalidade' WHERE ID = $id";

    if (mysqli_query($ligacao, $sql)) {
        header('Location: index.php');
    } else {
        echo "Erro ao atualizar o registro: " . mysqli_error($ligacao);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Editar Jogador</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous" />
  <link rel="stylesheet" href="styles.css" />
  <link href="https://fonts.googleapis.com/css2?family=Anta&display=swap" rel="stylesheet" />
  <script src="https://kit.fontawesome.com/d010c1545b.js" crossorigin="anonymous"></script>
  <link rel="icon" type="image/png" sizes="16x16" href="./Imagens/favicon.ico">
</head>
<body>

  <?php include 'partes/nav.html'; ?>

  <div class="container">
    <div class="row justify-content-center mt-5">
      <div class="col-md-8">
        <form action="editar.php?id=<?php echo $id; ?>" method="post">
          <input type="hidden" name="id" value="<?php echo $linha['ID']; ?>">
          <div class="form-row">
            <div class="form-group col-md-4">
              <label for="nome">Nome</label>
            </div>
            <div class="form-group col-md-8">
              <input type="text" class="form-control" id="nome" name="nome" value="<?php echo $linha['Nome']; ?>">
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-4">
              <label for="idade">Idade</label>
            </div>
            <div class="form-group col-md-8">
              <input type="number" class="form-control" id="idade" name="idade" value="<?php echo $linha['Idade']; ?>">
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-4">
              <label for="numero">Número</label>
            </div>
            <div class="form-group col-md-8">
              <input type="number" class="form-control" id="numero" name="numero" value="<?php echo $linha['Nª']; ?>">
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-4">
              <label for="posicao">Posição</label>
            </div>
            <div class="form-group col-md-8">
              <input type="text" class="form-control" id="posicao" name="posicao" value="<?php echo $linha['Posicao']; ?>">
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-4">
              <label for="nacionalidade">Nacionalidade</label>
            </div>
            <div class="form-group col-md-8">
              <input type="text" class="form-control" id="nacionalidade" name="nacionalidade" value="<?php echo $linha['Nacionalidade']; ?>">
            </div>
          </div>
          <button type="submit" class="btn btn-primary btn-block">Confirmar</button>
        </form>
        <a href="index.php" class="btn btn-voltar btn-block mt-3">Voltar</a>
        <a href="remover.php?id=<?php echo $linha['ID']; ?>" class="btn btn-remove btn-block mt-3">Remover</a>
      </div>
    </div>
  </div>

  <?php include 'partes/footer.html'; ?>

  <!-- Optional JavaScript -->
  <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>