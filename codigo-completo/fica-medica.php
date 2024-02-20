<?php
include('conexao.php');
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

$nome = '';
$data_nascimento = '';
$grupo_sanguineo = '';
$peso = '';
$altura = '';
$sexo = '';
$alergia = '';
$problemas = '';
$vacinas = '';

if (isset($_SESSION['controleuser'])) {
    $cpf = $_SESSION['controleuser'];
    $sql_comando = "SELECT * FROM ficha_medica WHERE CPF = '$cpf'";
    $sql_execute = $mysqli->query($sql_comando) or die("Falha na execução do código SQL: " . $mysqli->error);

    if ($sql_execute && mysqli_num_rows($sql_execute) > 0) {
        $resultado = mysqli_fetch_array($sql_execute);
        $nome = $resultado[2];
        $data_nascimento = $resultado[3];
        $grupo_sanguineo = $resultado[4];
        $peso = $resultado[5];
        $altura = $resultado[6];
        $sexo = $resultado[7];
        $alergia = $resultado[8];
        $problemas = $resultado[9];
        $vacinas = $resultado[10];
    } else {
echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>';
echo '<script>';
echo 'Swal.fire({
  title: "Custom width, padding, color, background.",
  width: 600,
  padding: "3em",
  color: "#716add",
  background: "#fff url(/images/trees.png)",
  backdrop: `
    rgba(0,0,123,0.4)
    url("/images/nyan-cat.gif")
    left top
    no-repeat
  `
});';
echo '</script>';
    }
} else {
    echo "Sessão 'controleuser' não está definida.";
}
?>



<html lang="pt-bt">
	<head>
		<meta charset="utf-8">	
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
    	<link rel="stylesheet" href="/css/ficha-medica-css/fica-medica.css">
     	<link rel="shortcut icon" href="img/icon2.png">
		<title>AASH - Ficha Médica</title>
		
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
            <a href="marcar-consultas.php">Consulta</a>
            <a class="ativos" href="fica-medica.php">Ficha Médica</a>
            <a href="perfil.php">Perfil</a>

        </div>
    </div>
    <div tabindex="0" onclick="closesidebar()" class="content" id="content">
        <h1>Ficha Médica do Paciente</h1>
	</div>
		<form method="POST" action="">
			<div id="totalF">
			<fieldset>
				
				<label>Nome Completo:</label>
				<input type="text" name="nome">
				<label>Data de Nascimento:</label>
				<input type="date" name="idade">
				<br>
				<br>
				<br>
				<label>Grupo Sanguíneo:</label>
				<select name="tip_sangue">
					<option>A+</option>
					<option>A-</option>
					<option>B+</option>
					<option>B-</option>
					<option>AB+</option>
					<option>AB-</option>
					<option>O+</option>
					<option>O-</option>
					<option>NÃO SEI</option>
				</select>
				<br>
				<br>
				<br>
				<label>Peso:</label>
				<input type="text" name="peso">
				<label>Altura:</label>
				<input type="text" name="grpS">
				<br><br>
				</fieldset>
				<fieldset>
					<legend><h2>Sexo</h2></legend>
					<input type="radio" name="sex"value="M">
					<label>Masculino</label>
					<input type="radio" name="sex" value="F">
					<label>Feminino</label>
				</fieldset>
				<br><br>
			<fieldset class="org1">
				<legend><h2>Vacinado contra:</h2></legend>
				<br>
				<input type="checkbox" name="vacinas[]" value="Covid-19">
				<label>Covid-19</label>
				<label class="invi">----------------------------------</label>
				<input type="checkbox" name="vacinas[]" value="Sarampo">
				<label>Sarampo</label>
				<br><br>
				<input type="checkbox" name="vacinas[]" value="Caxumba">
				<label>Caxumba</label>
				<label class="invi">---------------------------------</label>
				<input type="checkbox" name="vacinas[]" value="Rubéola">
				<label>Rubéola</label>
				<br><br>
				<input type="checkbox" name="vacinas[]" value="Hepatite B">
				<label>Hepatite B</label>
				<label class="invi">--------------------------------</label>
				<input type="checkbox" name="vacinas[]" value="Febre Amarela">
				<label>Febre Amarela</label>
				<br><br>
				<input type="checkbox" name="vacinas[]" value="Difteria">
				<label>Difteria</label>
				<label class="invi">-------------------------------------</label>	
				<input type="checkbox" name="vacinas[]" value="Tétano">
				<label>Tétano</label>
			</fieldset>
			<fieldset>
				<legend><h2>Tem problemas com:</h2></legend>
				<br>
				 <input type="checkbox" name="problemas[]" value="Asma">
				<label>Asma</label>
				<label class="invi">----------------------------------</label>
				 <input type="checkbox" name="problemas[]" value="Coração">
				<label>Coração</label>
				<label class="invi">----------------------------------</label>
				 <input type="checkbox" name="problemas[]" value="Sinusite">
				<label>Sinusite</label>
				<label class="invi">----------------------------------</label>
				 <input type="checkbox" name="problemas[]" value="Hemorragia">
				<label>Hemorragia</label>
				<br><br>
				<input type="checkbox" name="problemas[]" value="Sonambulismo">
				<label>Sonambulismo</label>
				<label class="invi">--------------------</label>
				<input type="checkbox" name="problemas[]" value="Diabetes">
				<label>Diabetes</label>
				<label class="invi">---------------------------------</label>
				<input type="checkbox" name="problemas[]" value="Ouvidos">
				<label> Ouvidos</label>
				<br><br>
				<input type="checkbox" name="problemas[]" value="Desmaios">
				<label>Desmaios</label>
				<label class="invi">----------------------------</label>
				<input type="checkbox" name="problemas[]" value="Rinite Alérgica">
				<label>Rinite Alérgica</label>
				<label class="invi">-------------------------</label>
				<input type="checkbox" name="problemas[]" value="Epilepsia">
				<label>Epilepsia</label>
				<br><br>
				
				<label>Alergia a: (escrva caso você tem alguma alergia)</label>
				<input type="text" name="alergia">
			</fieldset>
			<br>
			<br>
			<div id="btn-SI">
			<input type="submit" name="botaoSalMod" value="Salvar / Modificar" >
			</div>
			</div>
		</form>
			<div class="content">
    <h1>Ficha Médica - Informações</h1>
    <form id="meuFormulario">
        <div class="form-group">
            <label for="nome">Nome Completo:</label>
            <input type="text" id="nome" name="nome" value="<?= $nome ?>" readonly>
        </div>

        <div class="form-group">
            <label for="data_nascimento">Data de Nascimento:</label>
            <input type="text" id="data_nascimento" name="data_nascimento" value="<?= $data_nascimento ?>" readonly>
        </div>

        <div class="form-group">
            <label for="grupo_sanguineo">Grupo Sanguíneo:</label>
            <input type="text" id="grupo_sanguineo" name="grupo_sanguineo" value="<?= $grupo_sanguineo ?>" readonly>
        </div>

        <div class="form-group">
            <label for="peso">Peso:</label>
            <input type="text" id="peso" name="peso" value="<?= $peso ?>" readonly>
        </div>

        <div class="form-group">
            <label for="altura">Altura:</label>
            <input type="text" id="altura" name="altura" value="<?= $altura ?>" readonly>
        </div>

        <div class="form-group">
            <label>Sexo:</label>
            <input type="text" id="sexo" name="sexo" value="<?= ($sexo == 'M') ? 'Masculino' : (($sexo == 'F') ? 'Feminino' : '') ?>" readonly>
        </div>

        <div class="form-group">
            <label for="alergia">Alergia:</label>
            <input type="text" id="alergia" name="alergia" value="<?= $alergia ?>" readonly>
        </div>

        <div class="form-group">
            <label for="problemas">Problemas:</label>
            <input type="text" id="problemas" name="problemas" value="<?= $problemas ?>" readonly>
        </div>

        <div class="form-group">
            <label for="vacinas">Vacinas:</label>
            <input type="text" id="vacinas" name="vacinas" value="<?= $vacinas ?>" readonly>
        </div>
		<div id="btn-SI">
		<input type="button" value="Imprimir" onClick="imprimirFormulario()"/>
		</div>
		</form>
</div>
		<script src="./js/fm-java.js"></script>
	</body>
</html>
<?php
if (isset($_SESSION['controleuser']) && isset($_POST['botaoSalMod'])) {
    $cpf = $_SESSION['controleuser'];
    $sql_comando = "SELECT * FROM ficha_medica WHERE CPF = '$cpf'";
    $sql_execute = $mysqli->query($sql_comando) or die("Falha na execução do código SQL: " . $mysqli->error);
    if ($sql_execute && mysqli_num_rows($sql_execute) == 0) {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Obtenção dos dados do formulário e validação
            $nome = isset($_POST['nome']) ? trim($mysqli->real_escape_string($_POST['nome'])) : '';
            $data_nascimento = isset($_POST['idade']) ? $_POST['idade'] : '';
            $grupo_sanguineo = isset($_POST['tip_sangue']) ? trim($mysqli->real_escape_string($_POST['tip_sangue'])) : '';
            $peso = isset($_POST['peso']) ? trim($mysqli->real_escape_string($_POST['peso'])) : '';
            $altura = isset($_POST['grpS']) ? trim($mysqli->real_escape_string($_POST['grpS'])) : '';
            $sexo = isset($_POST['sex']) ? $_POST['sex'] : '';
            $alergia = isset($_POST['alergia']) ? $mysqli->real_escape_string($_POST['alergia']) : '';
            $problemas = isset($_POST['problemas']) ? implode(", ", array_map(array($mysqli, 'real_escape_string'), $_POST['problemas'])) : "";
            $vacinas = isset($_POST['vacinas']) ? implode(", ", array_map(array($mysqli, 'real_escape_string'), $_POST['vacinas'])) : '';

            // Verifica se todos os campos obrigatórios estão preenchidos
            if (empty($nome) || empty($data_nascimento) || empty($grupo_sanguineo) || empty($peso) || empty($altura) || empty($sexo)) {
                echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>';
				echo "<script>Swal.fire('Preste a atenção pessoa!', 'Campos obrigatórios não estão preenchidos!', 'warning');</script>";
            } else {
                // Insere ou atualiza os dados no banco de dados
                $sql_code = "INSERT INTO ficha_medica (CPF, NOME, DATA_NASCIMENTO, GRUPO_SANGUINEO, PESO, ALTURA, SEXO, ALERGIA, PROBLEMAS, VACINAS) 
                            VALUES ('$cpf', '$nome', '$data_nascimento', '$grupo_sanguineo', '$peso', '$altura', '$sexo', '$alergia', '$problemas', '$vacinas')
                            ON DUPLICATE KEY UPDATE 
                            NOME = VALUES(NOME), 
                            DATA_NASCIMENTO = VALUES(DATA_NASCIMENTO), 
                            GRUPO_SANGUINEO = VALUES(GRUPO_SANGUINEO), 
                            PESO = VALUES(PESO), 
                            ALTURA = VALUES(ALTURA), 
                            SEXO = VALUES(SEXO), 
                            ALERGIA = VALUES(ALERGIA), 
                            PROBLEMAS = VALUES(PROBLEMAS), 
                            VACINAS = VALUES(VACINAS)";
                $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli->error);

                if ($sql_query) {
                    $_SESSION['controleuser'] = $cpf;
                    echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>';
                    echo '<script>Swal.fire({
                        title: "Sucesso!",
                        text: "Dados salvos/atualizados com sucesso!!",
                        icon: "success"});</script>';
						header("Location: https://aash.bio/fica-medica.php");
                } else {
                    echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>';
                    echo '<script>Swal.fire("Erro!", "Erro ao salvar/atualizar os dados. Por favor, tente novamente mais tarde.", "warning");</script>';
                }
            }
        }
    } else if ($sql_execute && mysqli_num_rows($sql_execute) > 0) {
        if (isset($_SESSION['controleuser'])) {
            $cpf = $_SESSION['controleuser'];
            $sql_comando = "SELECT * FROM ficha_medica WHERE CPF = '$cpf'";
            $sql_execute = $mysqli->query($sql_comando) or die("Falha na execução do código SQL: " . $mysqli->error);
            if ($sql_execute && mysqli_num_rows($sql_execute) > 0) {
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    // Obtenção dos dados do formulário e validação
                    $nome = isset($_POST['nome']) ? trim($mysqli->real_escape_string($_POST['nome'])) : '';
                    $data_nascimento = isset($_POST['idade']) ? $_POST['idade'] : '';
                    $grupo_sanguineo = isset($_POST['tip_sangue']) ? trim($mysqli->real_escape_string($_POST['tip_sangue'])) : '';
                    $peso = isset($_POST['peso']) ? trim($mysqli->real_escape_string($_POST['peso'])) : '';
                    $altura = isset($_POST['grpS']) ? trim($mysqli->real_escape_string($_POST['grpS'])) : '';
                    $sexo = isset($_POST['sex']) ? $_POST['sex'] : '';
                    $alergia = isset($_POST['alergia']) ? $mysqli->real_escape_string($_POST['alergia']) : '';
                    $problemas = isset($_POST['problemas']) ? implode(", ", array_map(array($mysqli, 'real_escape_string'), $_POST['problemas'])) : "";
                    $vacinas = isset($_POST['vacinas']) ? implode(", ", array_map(array($mysqli, 'real_escape_string'), $_POST['vacinas'])) : '';

                    // Verifica se todos os campos obrigatórios estão preenchidos
                    if (empty($cpf) || empty($nome) || empty($data_nascimento) || empty($grupo_sanguineo) || empty($peso) || empty($altura) || empty($sexo)) {
						echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>';
                        echo "<script>Swal.fire('Preste a atenção pessoa!', 'Campos obrigatórios não estão preenchidos!', 'warning');</script>";
                    } else {
                        $sql_code = "UPDATE ficha_medica SET NOME = '$nome', DATA_NASCIMENTO = '$data_nascimento', GRUPO_SANGUINEO = '$grupo_sanguineo', PESO = '$peso', ALTURA = '$altura', SEXO = '$sexo', ALERGIA = '$alergia', PROBLEMAS = '$problemas', VACINAS = '$vacinas' WHERE CPF = '$cpf'";
                        $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli->error);

                        if ($sql_query) {
                            echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>';
                            echo '<script>Swal.fire({
                                title: "Sucesso!",
                                text: "Dados modificados com sucesso",
                                icon: "success",});</script>';
							header("Location: https://aash.bio/fica-medica.php");
                        } else {
                            echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>';
                            echo '<script>Swal.fire("Erro!", "Erro ao atualizar os dados. Tente novamente mais tarde.", "error");</script>';
                        }
                    }
                }
            } else {
				echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>';
                echo "<script>Swal.fire('Hm...', 'Qual é o motivo de erro?', 'warning');</script>";
            }
        }
    }
}
?>