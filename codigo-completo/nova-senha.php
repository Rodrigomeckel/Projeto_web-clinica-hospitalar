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
			<form method="POST">
            <div class="textfield">
                <label for="Senha">Nova senha</label>
                <input type="password" name="novsenha" placeholder="Senha">
                <p> Digite sua nova senha...</p>
            </div>
			<div class="textfield">
                <label for="Confirme senha">Digite Novamente</label>
                <input type="password" name="confnovsenha" placeholder="Confirme senha">
                <p> Confirme sua nova senha!</p>
            </div>
            <button type="submit" class="btn-veri">Atualizar</button>
			</form>
                <div class="textfield">
                <br><a href="index.php">Para cancelar a ação, clique <br>aqui para voltar a tela inicial</a>
                </div>
        </div>
    </div>
    <script src="./js/mask-java.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
</html>
<?php
include('conexao.php');

if(isset($_POST['novsenha']) && isset($_POST['confnovsenha']) && isset($_GET['cpf'])) {
	
	$cpf = $_GET['cpf'];
    $novasenha = $mysqli->real_escape_string($_POST['novsenha']);
    $confnovasenha = $mysqli->real_escape_string($_POST['confnovsenha']);

    if(empty($novasenha) || empty($confnovasenha)) {
        echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>';
        echo '<script>Swal.fire("Atenção!", "Preencha todos os campos.", "warning");</script>';
    } else if($novasenha != $confnovasenha) {
        echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>';
        echo '<script>Swal.fire("Atenção!", "As senhas não coincidem.", "warning");</script>';
    } else {

        // Query para atualizar a senha no banco de dados
        $sql_code = "UPDATE cadastro_paciente SET SENHA = '$novasenha' WHERE CPF = '$cpf'";
        $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli->error);

        if($sql_query) {
            echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>';
            echo '<script>Swal.fire({
                title: "Sucesso!",
                text: "Senha atualizada com sucesso!",
                icon: "success",
                willClose: () => {
                    window.location.href = "https://aash.bio/index.php";
                }
            });</script>';
        } else {
            echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>';
            echo '<script>Swal.fire("Erro!", "Erro ao atualizar a senha. Tente novamente mais tarde.", "error");</script>';
        }
    }
}
?>