<?php
session_start();
require_once('conexao.php');
if (isset($_POST['cadastrar_categoria'])) {
    $nome_categoria = trim($_POST['nome_categoria']);

    if (empty($nome_categoria)) {
        die('O nome da categoria não pode estar vazio.');
    }

    $nome_categoria = mysqli_real_escape_string($conn, $nome_categoria);

    $sql = "INSERT INTO categorias (nome_categoria) VALUES('$nome_categoria')";

    if (mysqli_query($conn, $sql)) {
        header('Location: categorias.php');
        exit();
    } else {
        die('Erro ao cadastrar a categoria: ' . mysqli_error($conn));
    }
}
if (isset($_POST['cadastrar_mes'])) {
    $nome_mes = trim($_POST['nome_mes']);
    $ano = trim($_POST['ano']);

    if (empty($nome_mes) || empty($ano)) {
        die('Nome do mês e ano são obrigatórios.');
    }



    $sql = "INSERT INTO meses (nome_mes, ano) VALUES('$nome_mes', '$ano')";

    if (mysqli_query($conn, $sql)) {
        header('Location: meses.php');
        exit();
    } else {
        die('Erro ao cadastrar o mês: ' . mysqli_error($conn));
    }
}


if (isset($_POST['cadastrar_movimentacao'])) {
    $data_transacao = trim($_POST['data_transacao']);
    $tipo_transacao = trim($_POST['tipo_transacao']);
    $descricao = trim($_POST['descricao']);
    $valor = trim($_POST['valor']);
    $categoria_id = trim($_POST['categoria_id']);

    if (empty($data_transacao) || empty($tipo_transacao) || empty($descricao) || empty($valor) || empty($categoria_id)) {
        die('Todos os campos são obrigatórios.');
    }
    $sql = "INSERT INTO movimentacoes (data_transacao, tipo_transacao, descricao, valor, categoria_id) VALUES ('$data_transacao', '$tipo_transacao', '$descricao', '$valor', '$categoria_id')";

    if (mysqli_query($conn, $sql)) {
        header('Location: index.php');
        exit();
    } else {
        die('Erro ao cadastrar a movimentação: ' . mysqli_error($conn));
    }
}
if (isset($_POST['delete_categoria'])) {
    $usuarioId = mysqli_real_escape_string($conn, $_POST['delete_categoria']);
    $sql = "DELETE FROM categorias WHERE id = '$usuarioId'";

    mysqli_query($conn, $sql);


    header('Location: categorias.php');
    exit;
}