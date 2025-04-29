<?php

header("Content-Type: application/json");

$arquivo = "usuarios.json";

// Lê os dados do arquivo JSON
function lerUsuarios($arquivo) {
    if (!file_exists($arquivo)) {
        return [];
    }

    $dados = file_get_contents($arquivo);
    return json_decode($dados, true);
}

// Salva os dados no arquivo JSON
function salvarUsuarios($arquivo, $usuarios) {
    file_put_contents($arquivo, json_encode($usuarios, JSON_PRETTY_PRINT));
}

$metodo = $_SERVER['REQUEST_METHOD'];

// Pega o corpo da requisição (para POST/PUT)
$entrada = json_decode(file_get_contents("php://input"), true);

// Obtem ID da URL, se existir
$id = isset($_GET['id']) ? intval($_GET['id']) : null;

// ROTAS:
switch ($metodo) {
    case 'GET':
        $usuarios = lerUsuarios($arquivo);
        echo json_encode($usuarios);
        break;

    case 'POST':
        $usuarios = lerUsuarios($arquivo);
        $novoId = count($usuarios) > 0 ? max(array_column($usuarios, 'id')) + 1 : 1;
        $entrada['id'] = $novoId;
        $usuarios[] = $entrada;
        salvarUsuarios($arquivo, $usuarios);
        echo json_encode(["mensagem" => "Usuário adicionado", "usuario" => $entrada]);
        break;

    case 'PUT':
        if ($id === null) {
            echo json_encode(["erro" => "ID não fornecido"]);
            break;
        }

        $usuarios = lerUsuarios($arquivo);
        $atualizado = false;

        foreach ($usuarios as &$usuario) {
            if ($usuario['id'] == $id) {
                if (isset($entrada['nome'])) $usuario['nome'] = $entrada['nome'];
                if (isset($entrada['email'])) $usuario['email'] = $entrada['email'];
                $atualizado = true;
                break;
            }
        }

        if ($atualizado) {
            salvarUsuarios($arquivo, $usuarios);
            echo json_encode(["mensagem" => "Usuário atualizado"]);
        } else {
            echo json_encode(["erro" => "Usuário não encontrado"]);
        }

        break;

    case 'DELETE':
        if ($id === null) {
            echo json_encode(["erro" => "ID não fornecido"]);
            break;
        }

        $usuarios = lerUsuarios($arquivo);
        $original = count($usuarios);
        $usuarios = array_filter($usuarios, fn($usuario) => $usuario['id'] != $id);

        if (count($usuarios) === $original) {
            echo json_encode(["erro" => "Usuário não encontrado"]);
        } else {
            salvarUsuarios($arquivo, array_values($usuarios)); // reindexa os elementos
            echo json_encode(["mensagem" => "Usuário removido"]);
        }

        break;

    default:
        echo json_encode(["erro" => "Método não suportado"]);
}
