<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Consulta CEP</title>
  <link rel="stylesheet" href="style.css"> <!-- Importa o estilo CSS -->
</head>
<body>

  <h2>Consulta de CEP</h2>

  <!-- Formulário para o usuário digitar o CEP -->
  <form method="GET">
    <input type="text" name="cep" placeholder="Digite o CEP" pattern="\d{8}" title="Digite 8 números" required>
    <button type="submit">Buscar</button>
  </form>

  <?php
    // Verifica se o CEP foi enviado pelo formulário
    if (isset($_GET['cep'])) {
      $cep = $_GET['cep'];
      $url = "https://viacep.com.br/ws/$cep/json/"; // URL da API ViaCEP

      // Obtém os dados do CEP e converte de JSON para array PHP
      $dados = file_get_contents($url);
      $dados = json_decode($dados, true);

      // Verifica se o CEP é válido
      if (!isset($dados['erro'])) {
        echo "<div id='resultado'>";
        echo "<p><strong>Logradouro:</strong> " . $dados['logradouro'] . "</p>";
        echo "<p><strong>Bairro:</strong> " . $dados['bairro'] . "</p>";
        echo "<p><strong>Localidade:</strong> " . $dados['localidade'] . "</p>";
        echo "<p><strong>UF:</strong> " . $dados['uf'] . "</p>";

        // Informações adicionais para São Paulo
        if ($dados['uf'] == "SP") {
          echo "<p><strong>Estado:</strong> São Paulo</p>";
          echo "<p><strong>Região:</strong> Sudeste</p>";
        }

        // Parte nova: busca imagem da cidade com a API do Pixabay
        $chavePixabay = '50275611-f3812ecd94427d526537c9647'; // Sua chave da API
        $nomeCidade = $dados['localidade']; // Ex: "São Paulo"
        $uf = $dados['uf']; // Ex: "SP"

        // Monta a URL para buscar imagens da cidade + UF
        $cidadeBusca = urlencode("$nomeCidade $uf cidade");
        $urlImagem = "https://pixabay.com/api/?key=$chavePixabay&q=$cidadeBusca&image_type=photo&orientation=horizontal&per_page=3";

        // Busca os dados da imagem
        $respostaImagem = file_get_contents($urlImagem);
        $imagens = json_decode($respostaImagem, true);

        // Se houver imagens encontradas
        if (isset($imagens['hits']) && count($imagens['hits']) > 0) {
          echo "<h3>Imagens da cidade:</h3>";
          echo "<div style='display: flex; gap: 10px; flex-wrap: wrap;'>";

          // Mostra as 3 primeiras imagens
          for ($i = 0; $i < min(3, count($imagens['hits'])); $i++) {
            $img = $imagens['hits'][$i];
            echo "<img src='" . $img['webformatURL'] . "' alt='Imagem da cidade' style='width:200px; height:auto; border-radius: 5px;'>";
          }

          echo "</div>";
        } else {
          echo "<p>Nenhuma imagem da cidade foi encontrada.</p>";
        }

        echo "</div>";
      } else {
        // Caso o CEP seja inválido
        echo "<p class='erro'>CEP não encontrado.</p>";
      }
    }
  ?>

</body>
</html>
