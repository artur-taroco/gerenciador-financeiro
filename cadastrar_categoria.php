<!-- pagina para cadastrar as categorias -->
<!DOCTYPE html>
<html lang="PT-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

</head>
<body>
    <div class="container">
    <h1 class="mt-5">Cadastro de Categorias</h1>
    <a href="index.php" class="btn btn-warning float-end">Voltar a pagina inicial</a>
        
        <form action="acoes.php" method="POST">
            <div class="form-group">
                <label for="nome_categoria">Nome da Categoria:</label>
                <input type="text" class="form-control" id="nome_categoria" name="nome_categoria" required>
            </div>
            <button type="submit" class="btn btn-primary" name="cadastrar_categoria">Cadastrar</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>