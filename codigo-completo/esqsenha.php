<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/esqueceu senha-css/style-esq-senha.css">
    <link rel="shortcut icon" href="./img/icon2.png">
    <title>AASH - Recuperar senha</title>
</head>
<body>
    <div class="ini-tela">
        <div class="tela-esq_senha">
            <h1>RECUPERAR SENHA</h1>
			<form action= "" method="POST">
            <div class="textfield">
                <label for="cpf">Digite seu CPF</label>
                <input type="text" name="CPF" placeholder="CPF" maxlength="14" autocomplete="off" id="cpf">
                <p> Digite o seu CPF corretamente!</p>
            </div>
            <button type="submit" class="btn-veri">Verificar</button>
				</form>
                <div class="textfield">
                <br><a href="index.php">Clique aqui para voltar para tela incial</a>
                </div>
        </div>
    </div>
    <script src="./js/mask-java.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
</html>
<?php
include('conexao.php');

if(isset($_POST['CPF'])) {

    if(strlen($_POST['CPF']) == 0) {
        echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>';
        echo '<script>Swal.fire("Erro!", "Digite seu cpf!", "error");</script>';
    } else {

        $CPF = $mysqli->real_escape_string($_POST['CPF']);

        $sql_code = "SELECT * FROM cadastro_paciente WHERE CPF = '$CPF'";
        $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli->error);

        $quantidade = $sql_query->num_rows;

        if($quantidade == 1) {
            
            $usuario = $sql_query->fetch_assoc();
            $cpf = $usuario['CPF'];
            header("Location: https://aash.bio/nova-senha.php?cpf=$cpf"); // Redireciona com o CPF na URL

        } else {
            echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>';
        echo '<script>Swal.fire("Atenção!", "Cpf não encontrado! <br> verifique!", "warning");</script>';
        }

    }

}
?>