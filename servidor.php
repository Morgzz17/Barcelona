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
function deleteById($ligacao, $db_table, $id)
{
    $sql = "DELETE FROM " . $db_table . " WHERE id = " . $id;
    return mysqli_query($ligacao, $sql);
}

function get($ligacao, $db_table, $select, $condition="")
{
    $sql = "SELECT " . $select . " FROM " . $db_table;
    if($condition){
        $sql .= " " . $condition;
    }
    return mysqli_query($ligacao, $sql);
}
  //"UPDATE equipa SET Name = ‘Dinis’, Idade = 10 WHERE id = $id”
?>
