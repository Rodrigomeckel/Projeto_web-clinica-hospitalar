<?php
include('conexao.php');
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

if (isset($_SESSION['controleuser'])){
    $cpf = $_SESSION['controleuser'];

    $sql_comando = "SELECT * FROM cadastro_paciente WHERE CPF = '$cpf'";
    $sql_execute = $mysqli->query($sql_comando) or die("Falha na execução do código SQL: " . $mysqli->error);

    if ($sql_execute && mysqli_num_rows($sql_execute) > 0) {
        $resultado = mysqli_fetch_array($sql_execute);
		
    } else {
        echo "Usuário não encontrado no banco de dados.";
    }
} else {
    echo "Sessão 'controleuser' não está definida.";
}

		echo "<pre>";
		print_r($resultado);
		echo"</pre>";
?>