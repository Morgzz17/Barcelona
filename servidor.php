<?php
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
?>