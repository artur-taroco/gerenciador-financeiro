<!-- pagina para mostrar os meses -->
<?php
session_start();
require_once("conexao.php");

$sql = "SELECT * FROM meses";
$controle_financas = mysqli_query($conn, $sql);

?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meses</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
          <h1 class="navbar-brand" href="#">OzMr Finanças</h1>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="index.php">Saldo</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="categorias.php">Categorias</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="meses.php">Meses</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="cadastrar_movimentacao.php">Nova Movimentação</a>
              </li>
          </div>
        </div>
      </nav>
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>
                            Lista de Meses
                            <a href="cadastrar_mes.php" class="btn btn-primary float-end">Novo Mês</a>
                            <a href="index.php" class="btn btn-warning float-end">Voltar a pagina inicial</a>
                            
                        </h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Mês</th>
                                    <th>Ano</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (mysqli_num_rows($controle_financas) > 0): ?>
                                    <?php while ($meses = mysqli_fetch_assoc($controle_financas)): ?>
                                        <tr>
                                            <td><?php echo $meses['nome_mes']; ?></td>
                                            <td><?php echo $meses['ano']; ?></td>
                                        </tr>
                                    <?php endwhile; ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="2">Nenhum mês encontrada.</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>