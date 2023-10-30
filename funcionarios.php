<?php
require_once("backend/conection/conection.php");
require_once("backend/verify.php");
$nameUser = $_SESSION["nome"];

$sql = "SELECT id,nome,email,senha,idade,cargo,salario,cpf status FROM usuario";
$result = $conn->query($sql);

$users = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $users[] = $row;
    }
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
    <link rel="stylesheet" href="src/css/funcionarios.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300&display=swap" rel="stylesheet">

    <script src="https://kit.fontawesome.com/c49e0b56e6.js" crossorigin="anonymous"></script>
</head>
<body>

    <header>
        <div class="container">
            <div class="logo">
                <h2>Gestão de Armazém</h2>
            </div>
            <nav class="menu">
                <h2 class="ativa"><i class="fa-solid fa-bars"></i></h2>
                <ul class="campo">
                    <h2 class="fecha"><i class="fa-solid fa-circle-xmark"></i></h2>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="cadastroProd.php">Cadastrar</a></li>
                    <li><a href="perfil.php">Perfil</a></li>
                    <li><a href="balanco.php">Balanco</a></li>
                    <li><a href="funcionarios.php">Funcionarios</a></li>
                    <li><a href="login.php">Sair</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <section>
      <div class="container">
        <div class="user">
            <h1>Bem vindo, User</h1>
        </div>

        <h2>Funcionarios da Empresa</h2>
        <div class="table">
            <div class="titulo">
                <div class="celula"><h3>Nome</h3></div>
                <div class="celula"><h3>Idade</h3></div>
                <div class="celula"><h3>Cargo</h3></div>
                <div class="celula"><h3>Salario</h3></div>
                <div class="celula"><h3>opções</h3></div>
            </div>

            <?php foreach ($users as $user) { ?>
                <div class="content">
                    <div class="celula nome"><?php echo $user["nome"]?></div>
                    <div class="celula idade"><?php echo $user["idade"]?></div>
                    <div class="celula pg"><?php echo $user["cargo"]?></div>
                    <div class="celula sal"><?php echo $user["salario"]?></div>
                    <div class="celula btn">
                        <button>Editar</button>
                        <button><a href="backend/excuser.php?id=<?php echo $user['id']; ?>">Excluir</a></button>
                    </div>
                </div>
            <?php } ?>


         </div>
      </div>
    </section>

    <script src="src/js/main.js"></script>    
</body>
</html>