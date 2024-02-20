<?php
include('conexao.php');
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

$nomeCompleto = ""; // Inicializa a variável $nomeCompleto

if (isset($_SESSION['controleuser'])){
    $cpf = $_SESSION['controleuser'];

    $sql_comando = "SELECT * FROM cadastro_paciente WHERE CPF = '$cpf'";
    $sql_execute = $mysqli->query($sql_comando) or die("Falha na execução do código SQL: " . $mysqli->error);

    if ($sql_execute && mysqli_num_rows($sql_execute) > 0) {
        $resultado = mysqli_fetch_array($sql_execute);
        $nomeCompleto = $resultado[0]; // Atribui o valor à variável $nomeCompleto
    } else {
        echo "Usuário não encontrado no banco de dados.";
    }
} else {
    echo "Sessão 'controleuser' não está definida.";
}
?>

<html lang="pt-bt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/perfil-css/perfil.css">
    <title>AASH -Perfil</title>
</head>
<body>
    <div class="header" id="header">
        <button onclick="toggleSidebar()" class="btn_iconheader">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
              </svg>
        </button>
        <div class="logo_aash">
            <img src="img/logotradicional2.png" alt="LOGO AASH" id="logoheader">
        </div>
        <div class="navegador_header" id="navegador_header">
            <button onclick="toggleSidebar()" class="btn_iconheader">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-unindent" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M13 8a.5.5 0 0 0-.5-.5H5.707l2.147-2.146a.5.5 0 1 0-.708-.708l-3 3a.5.5 0 0 0 0 .708l3 3a.5.5 0 0 0 .708-.708L5.707 8.5H12.5A.5.5 0 0 0 13 8Z"/>
                    <path fill-rule="evenodd" d="M3.5 4a.5.5 0 0 0-.5.5v7a.5.5 0 0 0 1 0v-7a.5.5 0 0 0-.5-.5Z"/>
                  </svg>
            </button>
            <a href="tela-ini.php">Inicio</a>
            <a href="marcar-consultas.php">Consulta</a>
            <a href="fica-medica.php">Ficha Médica</a>
            <a class="ativos" href="perfil.php">Perfil</a>
        </div>
    </div>
    <div tabindex="0" onclick="closesidebar()" class="content" id="content">
       <div class="header_perfil">
        <div class="box-search">
        </div>
        <h1>Perfil</h1>
        <img class="avatar" src="/img/perfil-img/skin-ico.png" alt="Avatar">
       <div class="detalhes">
        <h1>Detalhes</h1>
        <span class="negrito">Nome:</span><br>
        <p><?php echo htmlspecialchars($nomeCompleto); ?></p>
        <span class="negrito">Telefone:</span><br>
        <p><?php echo isset($resultado[2]) ? htmlspecialchars($resultado[2]) : 'N/A'; ?></p>
        <span class="negrito">Data de Nascimento:</span><br>
        <p><?php echo isset($resultado[4]) ? htmlspecialchars($resultado[4]) : 'N/A'; ?></p>
    </div>
    </div>
</body>
</html>