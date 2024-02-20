<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/index-css/style-index.css">
    <link rel="shortcut icon" href="./img/icon2.png">
    <title>AASH - Login</title>
</head>
<body>
    <div class="main-login">
        <div class="login-esquerda">
            <h1>Faça seu login <br> E marque suas consultas!</h1>
            <img src="./img/index-img/aash hospital 2.svg" class="logo-img" alt="aash logo">
        </div>
        <div class="login-direita">
            <div class="card-login">
                <h1>LOGIN</h1>
                <form action="" method="post"> 
                    <div class="textfield">
                        <label for="usuario">CPF</label>
                        <input type="text" onchange="showValidar()" name="cpflogin" placeholder="CPF" autocomplete="off" maxlength="14" id="cpf">
                    </div>
                    <div class="textfield">
                        <label for="senha">Senha</label>
                        <input type="password" name="senhalogin" placeholder="Senha">
                        <a href="esqsenha.php">Esqueceu a senha?</a>
                    </div>
                    <button type="submit" class="btn-login" id="recover-passord-button"><a>Login</a></button>
                </form>
                <div class="textfield">
                    <a href="cadas.php">Caso não tenha cadastro, clique aqui!</a>
                </div>
            </div>
        </div>
    </div>
	    <script src="/js/mask-java.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
</html>
<?php
include('conexao.php');
session_start();

if(isset($_POST['cpflogin']) && isset($_POST['senhalogin'])) {

    $cpf = $mysqli->real_escape_string($_POST['cpflogin']);
	$_SESSION['controleuser'] = $cpf;
    $senha = $mysqli->real_escape_string($_POST['senhalogin']);

    if(empty($cpf) || empty($senha)) {
        echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>';
        echo '<script>Swal.fire("Erro!", "Preencha todos os campos.", "error");</script>';
    } else {

        $sql_code = "SELECT * FROM cadastro_paciente WHERE CPF = '$cpf' AND SENHA = '$senha'";
        $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli->error);

        $quantidade = $sql_query->num_rows;

        if($quantidade == 1) {
            header("Location: https://aash.bio/tela-ini.php");
        } else {
            echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>';
            echo '<script>Swal.fire("Erro!", "CPF ou senha incorretos.", "error");</script>';
        }
    }
}
?>