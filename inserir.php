<?php
// Verificar se o formulário foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $servidor = "localhost";
    $utilizador = "root";
    $senha = "";
    $bd = "fc_barcelona";

    // Estabelecer a conexão
    $ligacao = mysqli_connect($servidor, $utilizador, $senha, $bd);

    // Verificar se a conexão foi estabelecida corretamente
    if (mysqli_connect_errno()) {
        echo "Falha na conexão: " . mysqli_connect_error();
        exit();
    }

    // Recuperar e sanitizar os dados do formulário
    $nome = mysqli_real_escape_string($ligacao, $_POST['nome']);
    $idade = mysqli_real_escape_string($ligacao, $_POST['idade']);
    $numero = mysqli_real_escape_string($ligacao, $_POST['numero']);
    $posicao = mysqli_real_escape_string($ligacao, $_POST['posicao']);
    $nacionalidade = mysqli_real_escape_string($ligacao, $_POST['nacionalidade']);

    // Verificar se o jogador já existe na tabela jogador
    $sql_check_jogador = "SELECT ID FROM jogador WHERE ID_Epoca = 2023 AND ID IN (SELECT ID FROM equipa WHERE Nome = '$nome')";
    $result_check_jogador = mysqli_query($ligacao, $sql_check_jogador);

    if (mysqli_num_rows($result_check_jogador) > 0) {
        // O jogador já existe na tabela jogador
        $linha_jogador = mysqli_fetch_assoc($result_check_jogador);
        $id_jogador = $linha_jogador['ID'];
    } else {
        // O jogador não existe na tabela jogador, então insere-o
        $sql_inserir_jogador = "INSERT INTO jogador (ID_Epoca) VALUES (2023)";
        if (mysqli_query($ligacao, $sql_inserir_jogador)) {
            // Recupera o ID do jogador inserido
            $id_jogador = mysqli_insert_id($ligacao);
        } else {
            echo "<p>Erro ao inserir jogador: " . mysqli_error($ligacao) . "</p>";
            exit(); // Encerra a execução se houver erro na inserção do jogador
        }
    }

    // Preparar a consulta SQL para inserção na tabela equipa
    $sql_inserir_equipa = "INSERT INTO equipa (ID, Nome, Idade, `Nª`, Posicao, Nacionalidade) 
                           VALUES ($id_jogador, '$nome', $idade, $numero, '$posicao', '$nacionalidade')";

    // Executar a consulta e verificar se foi bem-sucedida
    if (mysqli_query($ligacao, $sql_inserir_equipa)) {
        echo "<p>Novo jogador inserido com sucesso na equipa!</p>";
    } else {
        echo "<p>Erro ao inserir jogador na equipa: " . mysqli_error($ligacao) . "</p>";
    }

    // Fechar a conexão
    mysqli_close($ligacao);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Editar Jogador</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="styles.css">
  <link href="https://fonts.googleapis.com/css2?family=Anta&display=swap" rel="stylesheet">
  <script src="https://kit.fontawesome.com/d010c1545b.js" crossorigin="anonymous"></script>
  <link rel="icon" type="image/png" sizes="16x16" href="./Imagens/favicon.ico">
</head>
<body>

<?php include 'partes/nav.html'; ?>

<div class="container">
  <div class="row justify-content-center mt-5">
    <div class="col-md-8">
      <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <input type="hidden" name="id" value="<?php echo isset($linha['ID']) ? $linha['ID'] : ''; ?>">
        <div class="form-row">
          <div class="form-group col-md-4">
            <label for="nome">Nome</label>
          </div>
          <div class="form-group col-md-8">
            <input type="text" class="form-control" id="nome" name="nome" value="<?php echo isset($linha['Nome']) ? $linha['Nome'] : ''; ?>">
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-4">
            <label for="idade">Idade</label>
          </div>
          <div class="form-group col-md-8">
            <input type="number" class="form-control" id="idade" name="idade" value="<?php echo isset($linha['Idade']) ? $linha['Idade'] : ''; ?>">
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-4">
            <label for="numero">Número</label>
          </div>
          <div class="form-group col-md-8">
            <input type="number" class="form-control" id="numero" name="numero" value="<?php echo isset($linha['Nª']) ? $linha['Nª'] : ''; ?>">
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-4">
            <label for="posicao">Posição</label>
          </div>
          <div class="form-group col-md-8">
            <input type="text" class="form-control" id="posicao" name="posicao" value="<?php echo isset($linha['Posicao']) ? $linha['Posicao'] : ''; ?>">
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-4">
            <label for="nacionalidade">Nacionalidade</label>
          </div>
          <div class="form-group col-md-8">
            <input type="text" class="form-control" id="nacionalidade" name="nacionalidade" value="<?php echo isset($linha['Nacionalidade']) ? $linha['Nacionalidade'] : ''; ?>">
          </div>
        </div>
        <button type="submit" class="btn btn-primary btn-block">Confirmar</button>
      </form>
      <a href="index.php" class="btn btn-voltar btn-block mt-3">Voltar</a>
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

