<?php
    // Define o tipo de resposta como JSON
    header("Content-Type: application/json");

    // Obtém o método HTTP utilizado na requisição
    $metodo = $_SERVER['REQUEST_METHOD'];

    // Define o caminho do arquivo JSON
    $arquivo = 'usuarios.json';

    // Verifica se o arquivo JSON existe. Caso não, cria um arquivo vazio com formato JSON
    if (!file_exists($arquivo)) {
        file_put_contents($arquivo, json_encode([], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
    }

    // Lê o conteúdo do arquivo JSON e converte para um array PHP
    $usuarios = json_decode(file_get_contents($arquivo), true);

    // Realiza as operações dependendo do método HTTP
    switch ($metodo) {

        // Caso o método seja GET (requisição para obter dados)
        case 'GET':
            // Verifica se foi passado um parâmetro 'id' na URL
            if (isset($_GET['id'])) {
                $id = intval($_GET['id']);  // Converte o valor de 'id' para inteiro
                $usuario_encontrado = null;

                // Procura pelo usuário com o ID fornecido
                foreach ($usuarios as $usuario) {
                    if ($usuario['id'] == $id) {
                        $usuario_encontrado = $usuario;
                        break; // Sai do loop caso o usuário seja encontrado
                    }
                }

                // Se o usuário foi encontrado, retorna os dados dele
                if ($usuario_encontrado) {
                    echo json_encode($usuario_encontrado, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
                } else {
                    // Se o usuário não for encontrado, retorna erro 404
                    http_response_code(404);
                    echo json_encode(["erro" => "Usuário não encontrado"], JSON_UNESCAPED_UNICODE);
                }
            } else {
                // Caso não seja passado um ID, retorna todos os usuários
                echo json_encode($usuarios, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
            }
            break;

        // Caso o método seja POST (requisição para criar novos dados)
        case 'POST':
            // Lê os dados enviados no corpo da requisição (JSON)
            $dados = json_decode(file_get_contents('php://input'), true);

            // Verifica se os campos 'nome' e 'email' foram enviados
            if (!isset($dados["nome"]) || !isset($dados["email"])) {
                http_response_code(400); // Retorna erro 400 se os campos forem obrigatórios
                echo json_encode(["erro" => "Nome e email são obrigatórios"], JSON_UNESCAPED_UNICODE);
                exit;  // Interrompe o script
            }

            // Gera um novo ID para o usuário. O ID será o maior existente + 1
            $novo_id = 1;
            if (!empty($usuarios)) {
                $ids = array_column($usuarios, 'id'); // Extrai todos os IDs dos usuários
                $novo_id = max($ids) + 1;  // Calcula o próximo ID
            }

            // Cria um novo usuário com os dados recebidos
            $novoUsuario = [
                "id" => $novo_id,
                "nome" => $dados["nome"],
                "email" => $dados["email"]
            ];

            // Adiciona o novo usuário ao array de usuários
            $usuarios[] = $novoUsuario;

            // Salva o array atualizado no arquivo JSON
            file_put_contents($arquivo, json_encode($usuarios, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));

            // Retorna uma mensagem de sucesso e os dados do novo usuário
            echo json_encode([
                "mensagem" => "Usuário inserido com sucesso",
                "usuario" => $novoUsuario
            ], JSON_UNESCAPED_UNICODE);
            break;

        // Caso o método não seja GET nem POST, retorna erro 405 (Método não permitido)
        default:
            http_response_code(405); // Método não permitido
            echo json_encode(["erro" => "Método não permitido"], JSON_UNESCAPED_UNICODE);
            break;
    }
?>
