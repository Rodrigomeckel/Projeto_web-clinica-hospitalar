<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/marcar-consulta-css/marcar-consulta.css">
    <link rel="shortcut icon" href="./img/icon2.png">
    <title>AASH - Marcar Consulta</title>
</head>
<body>
        <div class="header" id="header">
    <button onclick="toggleSidebar()" class="btn_iconheader">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
          </svg>
    </button>
    <div class="logo_aash">
        <img src="/img/logotradicional2.png" alt="LOGO AASH" id="logoheader">
    </div>
    <div class="navegador_header" id="navegador_header">
        <button onclick="toggleSidebar()" class="btn_iconheader">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-unindent" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M13 8a.5.5 0 0 0-.5-.5H5.707l2.147-2.146a.5.5 0 1 0-.708-.708l-3 3a.5.5 0 0 0 0 .708l3 3a.5.5 0 0 0 .708-.708L5.707 8.5H12.5A.5.5 0 0 0 13 8Z"/>
                <path fill-rule="evenodd" d="M3.5 4a.5.5 0 0 0-.5.5v7a.5.5 0 0 0 1 0v-7a.5.5 0 0 0-.5-.5Z"/>
              </svg>
        </button>
     
        <a href="tela-ini.php">Inicio</a>
        <a class="ativos" href="marcar-consulta.php">Consulta</a>
        <a href="fica-medica.php">Ficha Médica</a>
        <a href="perfil.php">Perfil</a>

    </div>
</div>
<div tabindex="0" onclick="closesidebar()" class="content" id="content">
    <h1>Marcar Consulta</h1>
</div>
<div id="totalF">
	<form method="POST" action="">
        <fieldset class="org1">
            <legend><h2>Data da Consulta:</h2></legend>
            <input type="date" id="data" name="data">
        </fieldset>
        <br>
        <fieldset class="org1">
        <div class="form-group">
        <label><H2>Horario da Consulta:</H2></label>
        <select id="horario" name="horario">
            <option value="09:00">09:00</option>
            <option value="10:30">10:30</option>
            <option value="11:00">11:00</option>
            <option value="12:30">12:30</option>
            <option value="13:00">13:00</option>
            <option value="14:30">14:30</option>
            <option value="15:00">15:00</option>
            <option value="16:30">16:30</option>
            <option value="17:00">17:00</option>
            <option value="18:30">18:30</option>
            <option value="19:00">19:00</option>
            <option value="20:30">20:30</option>
            <option value="21:00">21:00</option>
        </select>
    </fieldset>
        </div>
        <br>
        <fieldset class="org1">
            <div class="form-group">
            <label><h2>Especialidade:</h2></label>
            <select id="especialidade" name="especialidade">
                <option value="Geriatria">Geriatra</option>
                <option value="Cardiologia">Cardiologia</option>
                <option value="Urologia">Urologia</option>
                <option value="Psicologia">Psicologia</option>
                <option value="Clínica Geral">Clínica Geral</option>
                <option value="Dermatologia">Dermatologia</option>
                <option value="Pediatria">Pediatria</option>
                <option value="Ginecologia">Ginecologia</option>
                <option value="Neurologia">Neurologia</option>
                <option value="Obstetrícia">Obstetrícia</option>
                <option value="Oftalmologia">Oftalmologia</option>
                <option value="Ortopedia">Ortopedia</option>
            </select>
        </fieldset>
        </div>
        <br>
        <br>
        <h3>OBS: Caso você  queira limpar os dados, <br> clique no botão Resetar</h3>
        <br>
        <div id="btn-SI">
        <input type="submit" name="btnMarcar" value="Marcar">
        <input type="reset" value="Resetar">
        </div>
        </div>
    </form>
	<br><br>
	<div id="btn-SI">
	<button id="btn-SII"><a href="exibir-consultas.php">Ver consultas marcadas</a></button>
      </div>
</body>
<script src="./js/mask-java.js"></script>
</html>

<?php
include('conexao.php');
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data = $mysqli->real_escape_string($_POST['data']);
    $horario = $mysqli->real_escape_string($_POST['horario']);
    $especialidade = $mysqli->real_escape_string($_POST['especialidade']);
    $cpf = $_SESSION['controleuser'];

    if (!empty($data) && !empty($horario) && !empty($especialidade)) {

    $sql_check = "SELECT * FROM consultas WHERE cpf = '$cpf' AND data = '$data' AND horario = '$horario' AND especialidade = '$especialidade'";
    $result = $mysqli->query($sql_check);

    if ($result === false) {
        die("Erro na consulta: " . $mysqli->error);
    }

    if ($result->num_rows > 0) {
        echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>';
        echo '<script>Swal.fire("Erro!", "Você já tem uma consulta marcada para esta data, horário e especialidade.", "error");</script>';
    } else {
        $sql_check_consulta = "SELECT * FROM consultas WHERE data = '$data' AND especialidade = '$especialidade' AND horario = '$horario'";
        $result_consulta = $mysqli->query($sql_check_consulta);

        if ($result_consulta === false) {
            die("Erro na consulta: " . $mysqli->error);
        }

        if ($result_consulta->num_rows > 0) {
            echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>';
            echo '<script>Swal.fire("Sucesso!", "Desculpe, já tem uma consulta marcada no mesmo dia e hora! Escolha outro dia.", "question");</script>';
        } else {
            $sql_insert = "INSERT INTO consultas (data, horario, especialidade, cpf) VALUES ('$data', '$horario', '$especialidade', '$cpf')";
            if ($mysqli->query($sql_insert) === TRUE) {
                echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>';
                echo '<script>Swal.fire("Sucesso!", "Consulta marcada com sucesso.", "success");</script>';
            } else {
                die("Erro ao inserir consulta: " . $mysqli->error);
            }
        }
    }
} else {
    echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>';
    echo '<script>Swal.fire("Erro!", "Por favor, preencha todos os campos do formulário.", "error");</script>';
}
}
?>
