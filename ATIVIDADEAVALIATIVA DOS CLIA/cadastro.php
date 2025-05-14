<?php

if (session_status() === PHP_SESSION_NONE) {
  session_start();
}

  include 'Usuario.php';

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cadastro de Usuário</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: #f2f2f2;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
    }

    .container {
      background-color: #fff;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
      width: 100%;
      max-width: 400px;
    }

    .container h2 {
      text-align: center;
      margin-bottom: 25px;
      color: #333;
    }

    .form-group {
      margin-bottom: 20px;
    }

    label {
      display: block;
      margin-bottom: 5px;
      color: #555;
    }

    input[type="text"],
    input[type="email"],
    input[type="password"] {
      width: 100%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 5px;
      box-sizing: border-box;
    }

    button {
      width: 100%;
      padding: 12px;
      background-color: #28a745;
      border: none;
      color: white;
      font-size: 16px;
      border-radius: 5px;
      cursor: pointer;
    }

    button:hover {
      background-color: #218838;
    }
  </style>
</head>

<?php
    function cadastrar_usuario() {
      $nome = $_REQUEST["nome"];
      $senha = $_REQUEST["senha"];
      $email = $_REQUEST["email"];

      $usuario = new Usuario($nome, $email, $senha);
      $usuario->save();

      echo "Usuário cadastrado com sucesso.";
    }

    if (isset($_REQUEST["nome"]) || isset($_REQUEST["senha"]) || isset($_REQUEST["email"])) {
      cadastrar_usuario();
    }
?>

<body>
  <div class="container">
    <h2>Cadastro de Usuário</h2>
    <form action="cadastro.php" method="post">
      <div class="form-group">
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" required>
      </div>
      <div class="form-group">
        <label for="email">E-mail:</label>
        <input type="email" id="email" name="email" required>
      </div>
      <div class="form-group">
        <label for="senha">Senha:</label>
        <input type="password" id="senha" name="senha" required>
      </div>
      <button type="submit">Cadastrar</button>
    </form>
  </div>
</body>
</html>
