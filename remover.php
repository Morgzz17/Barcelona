<?php
include 'servidor.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    // SQL para deletar o registro
    $sql = "DELETE FROM equipa WHERE ID = $id";

    if (mysqli_query($ligacao, $sql)) {
    // Redireciona para a página principal após a remoção
        header('Location: index.php');
    } else {
        echo "Erro ao deletar o registro: " . mysqli_error($ligacao);
    }

    mysqli_close($ligacao);
} else {
    echo "ID não especificado.";
}
?>