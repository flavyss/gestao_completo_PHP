<?php
require_once("backend/conection/conection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $senha = password_hash($_POST["senha"], PASSWORD_DEFAULT);
    $idade = $_POST["idade"];
    $cargo = $_POST["cargo"];
    $salario = $_POST["salario"];
    $cpf = $_POST["cpf"];

    $sql = "INSERT INTO usuario (nome, email, senha, idade, cargo, salario, cpf) VALUES (?,?,?,?,?,?,?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssss", $nome, $email, $senha, $idade, $cargo, $salario, $cpf);

    if ($stmt->execute()) {
        echo "<script>alert('" . $nome . " cadastrado com sucesso')</script>";
        header("location: login.php");
    } else {
        echo "Erro ao registrar: " . $stmt->error;
    }
    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Document</title>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="index">
    <meta name="keywords" content="Empresa, Sistema, Loja">
    <meta name="author" content="sv.rick , flavyss">

    <link rel="stylesheet" href="/src/css/style.css">
    <link rel="stylesheet" href="/src/css/login.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300&display=swap" rel="stylesheet">

    <script src="https://kit.fontawesome.com/c49e0b56e6.js" crossorigin="anonymous"></script>
</head>
<body>
    <header>
        <aside class="ld1">

        </aside>
        <aside class="ld2">
            <form action="" method="POST">
                <div class="logo">
                    <img src="src/midia/image/logo-design.png" alt="">
                </div>
                <h2>Faça Login na Sua Conta</h2>

                <div class="w100">
                    <p>Nome</p>
                    <input type="text" name="nome">
                </div>

                <div class="w100">
                    <p>Email</p>
                    <input type="text" name="email">
                </div>

                <div class="w100">
                    <p>Senha</p>
                    <input type="password" name="senha">
                </div>

                <div class="w100">
                    <p>Idade</p>
                    <input type="text" name="idade">
                </div>

                <div class="w100">
                    <p>Cargo</p>
                    <input type="text" name="cargo">
                </div>

                <div class="w100">
                    <p>Salário</p>
                    <input type="text" name="salario">
                </div>

                <div class="w100">
                    <p>CPF</p>
                    <input type="text" name="cpf">
                </div>


                <div class="lemb">
                    <input type="checkbox" name="lembrar">
                    <span>Lembrar meu Acesso</span>                    
                </div>

                <div class="w100s">
                    <input type="submit" value="Entrar">
                </div>
            </form>
        </aside>
    </header>
</body>
</html>