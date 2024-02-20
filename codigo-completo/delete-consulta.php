<?php
include('conexao.php');
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

if (isset($_SESSION['controleuser'])) {
    $cpf = $_SESSION['controleuser'];
} else {
    header('Location: https://aash.bio/exibir-consultas.php');
    exit();
}

if (!empty($_GET['data']) && !empty($_GET['especialidade']) && !empty($_GET['horario'])) {
    $data = $_GET['data'];
	$especialidade = $_GET['especialidade'];
	$horario = $_GET['horario'];

    // Use prepared statements para evitar SQL Injection
    $sqlSelect = "SELECT * FROM consultas WHERE cpf=? AND data=? AND horario=? AND especialidade=?";
    $stmt = $mysqli->prepare($sqlSelect);
    $stmt->bind_param("ssss", $cpf, $data, $horario, $especialidade);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Use prepared statements para evitar SQL Injection na exclusão
        $sqlDelete = "DELETE FROM consultas WHERE cpf=? AND data=? AND horario=? AND especialidade=?";
        $stmt = $mysqli->prepare($sqlDelete);
        $stmt->bind_param("ssss", $cpf, $data, $horario, $especialidade);
        $stmt->execute();

        header('Location: https://aash.bio/exibir-consultas.php');
        exit();
    }
}

// Se não houver linhas correspondentes ou se os parâmetros estiverem faltando, redirecione para a mesma página
header('Location: https://aash.bio/exibir-consultas.php');
exit();
?>
