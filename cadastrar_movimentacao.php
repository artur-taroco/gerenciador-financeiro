<!-- pagina para cadastrar as movimentacoes -->
<!DOCTYPE html>
<html lang="PT-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>
    <div class="container">
        <h1 class="mt-5">Cadastrar Movimentações</h1>
        <a href="index.php" class="btn btn-warning float-end">Voltar a pagina inicial</a>
        <form action="acoes.php" method="POST">
            <div class="form-group">
                <label for="data_transacao">Data da Transação:</label>
                <input type="date" class="form-control" id="data_transacao" name="data_transacao" required>
            </div>
            <div class="form-group">
                <label for="tipo_transacao">Tipo de Transação:</label>
                <select class="form-control" id="tipo_transacao" name="tipo_transacao" required>
                    <option value="entrada">Entrada</option>
                    <option value="saida">Saída</option>
                </select>
            </div>
            <div class="form-group">
                <label for="descricao">Descrição:</label>
                <input type="text" class="form-control" id="descricao" name="descricao" required>
            </div>
            <div class="form-group">
                <label for="valor">Valor:</label>
                <input type="number" class="form-control" id="valor" name="valor" step="0.01" required>
            </div>
            <div class="form-group">
                <label for="categoria_id">Categoria:</label>
                <select class="form-control" id="categoria_id" name="categoria_id" required>
                    <?php
                    require_once('conexao.php');
                    $sql = "SELECT id, nome_categoria FROM categorias";
                    $result = mysqli_query($conn, $sql);
                    while ($categoria = mysqli_fetch_assoc($result)) {
                        echo "<option value='{$categoria['id']}'>{$categoria['nome_categoria']}</option>";
                    }
                    ?>
                </select>
            </div>
            <!-- <button type="submit" class="btn btn-primary">Cadastrar</button> -->
            <button type="submit" class="btn btn-primary" name="cadastrar_movimentacao">Cadastrar</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>