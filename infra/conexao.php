<?php

$conexao = new mysqli("localhost", "root", "", "kanban_db");

if ($conexao->connect_error) {
    die("Erro na conexão: " . $conexao->connect_error);
}

$conexao->set_charset("utf8mb4");