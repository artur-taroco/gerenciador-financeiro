<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
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
                <a class="nav-link active" aria-current="page" href="index.php">Saldo</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="categorias.php">Categorias</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="meses.php">Meses</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="cadastrar_movimentacao.php">Nova Movimentação</a>
              </li>
          </div>
        </div>
      </nav>

      <div>
        <h1 id="balance" style="font-size: 100px;">R$ 1250,00</h1>
      </div>
      <hr id="status-line" style="border-width: 5px;">

      

      <div class="container">
    <h2>Extrato de Movimentações</h2>

    <?php
    require_once('conexao.php');

    if (!$conn) {
        die("<p style='color: red;'>Erro ao conectar ao banco de dados: " . mysqli_connect_error() . "</p>");
    }

    $sql = "SELECT 
                m.id,
                m.data_transacao,
                m.tipo_transacao,
                m.descricao,
                m.valor,
                c.nome_categoria,
                me.nome_mes,
                me.ano
            FROM movimentacoes m
            LEFT JOIN categorias c ON m.categoria_id = c.id
            LEFT JOIN meses me ON m.mes_id = me.id
            ORDER BY m.data_transacao DESC";

    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $tipoClasse = $row['tipo_transacao'] === 'Entrada' ? 'tipo-entrada' : 'tipo-saida';
            echo "<div class='movimentacao'>";
            echo "<p><strong>Data:</strong> " . date('d/m/Y', strtotime($row['data_transacao'])) . "</p>";
            echo "<p><strong>Tipo:</strong> <span class='$tipoClasse'>" . $row['tipo_transacao'] . "</span></p>";
            echo "<p><strong>Descrição:</strong> " . $row['descricao'] . "</p>";
            echo "<p><strong>Valor:</strong> R$ " . number_format($row['valor'], 2, ',', '.') . "</p>";
            echo "<p><strong>Categoria:</strong> " . ($row['nome_categoria'] ?? 'Sem categoria') . "</p>";
            echo "<p><strong>Mês:</strong> " . $row['nome_mes'] . " de " . $row['ano'] . "</p>";
            echo "</div>";
        }
    } else {
        echo "<p>Nenhuma movimentação cadastrada.</p>";
    }

    mysqli_close($conn);
    ?>
</div>

      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
      integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

      <script>
        const balanceElement = document.getElementById('balance');
        const statusLine = document.getElementById('status-line');

        const balanceText = balanceElement.innerText.replace('R$', '').replace(',', '.').trim();
        const balanceValue = parseFloat(balanceText);

        if (balanceValue > 0) {
            statusLine.style.borderColor = 'green';
        } else if (balanceValue === 0) {
            statusLine.style.borderColor = 'gray';
        } else if (balanceValue < 0) {
            statusLine.style.borderColor = 'red';
        }
      </script>

<?php
// require_once('conexao.php');

// if (!$conn) {
//     die("Erro ao conectar ao banco de dados: " . mysqli_connect_error());
// }

// $sql = "SELECT 
//             m.id,
//             m.data_transacao,
//             m.tipo_transacao,
//             m.descricao,
//             m.valor,
//             c.nome_categoria,
//             me.nome_mes,
//             me.ano
//         FROM movimentacoes m
//         LEFT JOIN categorias c ON m.categoria_id = c.id
//         LEFT JOIN meses me ON m.mes_id = me.id
//         ORDER BY m.data_transacao DESC";

// $result = mysqli_query($conn, $sql);

// if (mysqli_num_rows($result) > 0) {
//     echo "<h1>Movimentações Financeiras</h1>";
//     while ($row = mysqli_fetch_assoc($result)) {
//         echo "<div class='movimentacao'>";
//         echo "<p><strong>Data:</strong> " . date('d/m/Y', strtotime($row['data_transacao'])) . "</p>";
//         echo "<p><strong>Tipo:</strong> " . $row['tipo_transacao'] . "</p>";
//         echo "<p><strong>Descrição:</strong> " . $row['descricao'] . "</p>";
//         echo "<p><strong>Valor:</strong> R$ " . number_format($row['valor'], 2, ',', '.') . "</p>";
//         echo "<p><strong>Categoria:</strong> " . ($row['nome_categoria'] ?? 'Sem categoria') . "</p>";
//         echo "<p><strong>Mês:</strong> " . $row['nome_mes'] . " de " . $row['ano'] . "</p>";
//         echo "</div><hr>";
//     }
// } else {
//     echo "<p>Nenhuma movimentação cadastrada.</p>";
// }

// mysqli_close($conn);
?>

</body>
</html>

