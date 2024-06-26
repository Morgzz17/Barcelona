<?php include 'servidor.php'; ?>
<?php
// Executar a consulta

$resultado = get($ligacao, 'equipa E', 'E.ID, E.Nome, E.Idade, E.Nª, P.Descrição, E.Nacionalidade', 'LEFT JOIN posição P ON E.Posicao = P.Posição');
if (mysqli_num_rows($resultado) == 0) {
  echo "<br> Cliente não encontrado <br>";
  exit();
}
if (isset($_GET['deleteById'])) {
  $id = $_GET['deleteById'];
  if (deleteById($ligacao, 'equipa', $id)) {
    // Redireciona para a página principal após a remoção
    header('Location: index.php');
  } else {
    echo "Erro ao deletar o registro: " . mysqli_error($ligacao);
  }

}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>FC BARCELONA</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous" />
  <link rel="stylesheet" href="styles.css">
  <link href="https://fonts.googleapis.com/css2?family=Anta&display=swap" rel="stylesheet">
  <script src="https://kit.fontawesome.com/d010c1545b.js" crossorigin="anonymous"></script>
  <link rel="icon" type="image/png" sizes="16x16" href="./Imagens/favicon.ico">
  <style>
    /* Estilo adicional para a tabela */
    .table {
      font-size: 14px; /* Tamanho da fonte ajustável para dispositivos móveis */
    }
  </style>
</head>

<body>

  <?php include 'partes/nav.html'; ?>

  <div class="container">
    <div class="row-center mt-5">
      <div class="col-2 mt-2">
        <a href="inserir.php" class="bottom_inserir">
          <button class="inserir" type="button">Inserir</button>
        </a>
      </div>
        <div class="table-responsive">
          <table class="table tabela table-bordered">
            <thead>
              <tr class="titulotabela text-center">
                <th>Nome</th>
                <th>Idade</th>
                <th>Nº</th>
                <th>Posição</th>
                <th>Nacionalidade</th>
                <th colspan="2">Operações</th>
              </tr>
            </thead>
            <tbody class="text-center">
              <?php
              while ($linha = mysqli_fetch_assoc($resultado)) {
                echo "<tr>";
                echo "<td>" . $linha['Nome'] . "</td>";
                echo "<td>" . $linha['Idade'] . "</td>";
                echo "<td>" . $linha['Nª'] . "</td>";
                echo "<td>" . $linha['Descrição'] . "</td>";
                echo "<td>" . $linha['Nacionalidade'] . "</td>";
                echo "<td><a href='editar.php?id=" . $linha['ID'] . "'><img src='imagens/Editar.png' width='35'></a></td>";
                echo "<td><a href='?deleteById=" . $linha['ID'] . "'><img src='imagens/Remover.png' width='46'></a></td>";
                echo "</tr>";
              }
              ?>
            </tbody>
          </table>
        </div>
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
