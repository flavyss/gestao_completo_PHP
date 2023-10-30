<?php
    require_once("backend/conection/conection.php");
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $email = $_POST["email"];
        $senha = $_POST["senha"];

        $sql = "SELECT id, nome, senha,idade,cargo,salario,cpf FROM usuario WHERE email = ? LIMIT 1";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $stmt->bind_result($id, $nome, $senha_hash, $idade, $cargo,$salario,$cpf);

        if($stmt->fetch() && password_verify($senha, $senha_hash)){
            session_start();
            $_SESSION["nome"] = $nome;
            $_SESSION["id_user"] = $id;
            $_SESSION["idade"] = $idade;
            $_SESSION["senha"] = $senha;
            $_SESSION["email"] = $email;
            $_SESSION["cargo"] = $cargo;
            $_SESSION["salario"] = $salario;
            $_SESSION["cpf"] = $cpf;

            header("Location: index.php");
            exit();
        }
        else{
            echo "<script>alert('email ou senha incorreto ou não existente')</script>";
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

    <link rel="stylesheet" href="src/css/style.css">
    <link rel="stylesheet" href="src/css/login.css">
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
                    <p>Email</p>
                    <input type="text" name="email">
                </div>

                <div class="w100">
                    <p>Senha</p>
                    <input type="password" name="senha">
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