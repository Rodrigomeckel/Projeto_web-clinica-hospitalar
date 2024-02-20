<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/cadas-css/style-cadastrar.css">
    <link rel="shortcut icon" href="./img/icon2.png">
    <title>AASH - Cadastro</title>
</head>
<body>
    <div class="main-cadas">
        <div class="cadas">
            <h1>CADASTRO</h1>
            <form action="" method="post">
                <div class="textfield">
                    <label for="nome"> Nome Completo</label>
                    <input type="text" name="nome" placeholder="Nome">
                </div>
                <div class="textfield">
                    <label for="cpf"> CPF</label>
                    <input type="text" name="CPF" placeholder="CPF" maxlength="14" autocomplete="off" id="cpf">
                </div>
                <div class="textfield">
                    <label for="telefone">Telefone</label>
                    <input type="text" name="cell" placeholder="Número de telefone" maxlength="15" autocomplete="off" id="cell">
                </div>
                <div class="textfield">
                    <label for="senha"> Criar Senha</label>
                    <input type="password" name="senha" placeholder="Senha">
                </div>
				
				 <div class="textfield">
                    <label for="senha">Confirmar senha</label>
                    <input type="password" name="conf_senha" placeholder="Confirme senha">
                </div>
				
                <div class="textfield">
                    <label for="aniversário"> Data de Nascimento</label>
                    <input type="date" name="aniver"  placeholder="Aniversário">
                </div>
               <button type="submit" class="btn-final" id="cadastrar" onclick="cadastrar()">Finalizar</button>
                <div class="textfield">
                <br><a href="index.php"> Clique aqui para voltar!</a>
                </div>
            </form>
        </div>
    </div>
    <script src="./js/mask-java.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
</html>
<?php

include('conexao.php');
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Verifica se todas as variáveis estão definidas e não vazias
    if (isset($_POST['nome'], $_POST['CPF'], $_POST['cell'], $_POST['senha'], $_POST['conf_senha'], $_POST['aniver']) && 
        !empty($_POST['nome']) && !empty($_POST['CPF']) && !empty($_POST['cell']) && !empty($_POST['senha']) && !empty($_POST['conf_senha']) && !empty($_POST['aniver'])) {

        $nome = $mysqli->real_escape_string($_POST['nome']);
        $CPF = $mysqli->real_escape_string($_POST['CPF']);
        $cell = $mysqli->real_escape_string($_POST['cell']);
        $senha = $mysqli->real_escape_string($_POST['senha']);
        $conf_senha = $mysqli->real_escape_string($_POST['conf_senha']);
        $aniver = $mysqli->real_escape_string($_POST['aniver']);

        // Verifica se a senha e a confirmação de senha são iguais
        if ($senha != $conf_senha) {
            echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>';
            echo '<script>Swal.fire("Erro!", "Suas senhas não coincidem.", "error");</script>';
        } else {
            // Verifica se o CPF já está cadastrado
            $check_CPF = "SELECT * FROM cadastro_paciente WHERE CPF = '$CPF'";
            $CPF_exists = $mysqli->query($check_CPF);

            if ($CPF_exists->num_rows > 0) {
                echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>';
                echo '<script>Swal.fire("Erro!", "Este CPF já está cadastrado. Por favor, escolha outro.", "error");</script>';
            } else {
                // Insere os dados no banco de dados
                $sql_code = "INSERT INTO cadastro_paciente (NOME_COMPLETO, CPF, TELEFONE, SENHA, DATA_NASC) VALUES ('$nome', '$CPF', '$cell', '$senha', '$aniver')";
                $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli->error);

                if ($sql_query) {
					$_SESSION['controleuser'] = $CPF;
                    echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>';
                    echo '<script>Swal.fire({
                        title: "Sucesso!",
                        text: "Cadastro feito!",
                        icon: "success",
                        willClose: () => {
                            window.location.href = "https://aash.bio/tela-ini.php"; // Substitua "pagina_de_redirecionamento.php" pelo URL da página para a qual deseja redirecionar
                        }
                    });</script>';
                } else {
                    echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>';
                    echo '<script>Swal.fire("Erro!", "Erro ao cadastrar. Por favor, tente novamente mais tarde.", "warning");</script>';
                }
            }
        }
    } else {
        echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>';
        echo '<script>Swal.fire("Erro!", "Preencha todos os campos!", "error");</script>';
    }
}

?>