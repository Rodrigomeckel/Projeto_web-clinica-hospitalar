<?php
include('conexao.php');
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

$cpf = '';
$nomeCompleto = '';

if (isset($_SESSION['controleuser'])){
    $cpf = $_SESSION['controleuser'];
}

$sqlcomand = "SELECT * FROM consultas WHERE CPF = '$cpf' ORDER BY data ASC";
$result = $mysqli->query($sqlcomand) or die("Falha na execução do código SQL: " . $mysqli->error);

$sqlcomand2 = "SELECT NOME_COMPLETO FROM cadastro_paciente WHERE CPF = '$cpf'";
$result2 = $mysqli->query($sqlcomand2) or die("Falha na execução do código SQL: " . $mysqli->error);

// Extrair o nome completo do objeto de resultado
$nomeCompleto = $result2->fetch_assoc()['NOME_COMPLETO'];

?>

<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/exibir-consultas/exibir.css">
    <link rel="shortcut icon" href="./img/icon2.png">
    <title>AASH - Exibir Consultas</title>
</head>
<body>
    <h1>Suas Consultas Marcadas</h1>
    <div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Nome</th>
                    <th scope="col">CPF</th>
                    <th scope="col">Data</th>
                    <th scope="col">Horario</th>
                    <th scope="col">Especialidade</th>
					<th scope="col">Ação</th>
                </tr>
            </thead>
            <tbody>
                <?php
				if ($result->num_rows > 0) {
    while($userdata = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>".$nomeCompleto."</td>"; // Imprime o nome completo
        echo "<td>".$userdata['cpf']."</td>";
        echo "<td>".$userdata['data']."</td>";
        echo "<td>".$userdata['horario']."</td>";
        echo "<td>".$userdata['especialidade']."</td>";
		echo "<td>
        <a href='delete-consulta.php' class='delete-link' data-data='$userdata[data]' data-horario='$userdata[horario]' data-especialidade='$userdata[especialidade]' title='Deletar'>
            <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash3-fill' viewBox='0 0 16 16'>
                <path d='M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z'/>
            </svg>
        </a>
    </td>";
    }
} else {
	echo "<tr>";
    echo "<th scope='col'></th>";
    echo "<th scope='col'></th>";
    echo "<th scope='col'></th>";
    echo "<th scope='col'></th>";
    echo "<th scope='col'></th>";
    echo "<th scope='col'></th>";
    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";
	echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>";
    echo "<script>
            Swal.fire(
              'Informação',
              'Você não tem nenhuma consulta marcada',
              'info'
            );
          </script>";
}
?>

            </tbody>
        </table>
		<button id="btn-SII"><a href="marcar-consultas.php">Voltar</a></button>
    </div>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<script src="./js/fm-java.js"></script>
</body>
</html>
