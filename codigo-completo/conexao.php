<?php

$usuario = 'turma1342_user';
$senha = 'EteRJ#123.321#';
$database = 'turma1342_db';
$host = 'localhost:3306';

$mysqli = new mysqli($host, $usuario, $senha, $database);

if($mysqli->error) {
    die("Falha ao conectar ao banco de dados: " . $mysqli->error);
}

?>