<?php
require_once("backend/conection/conection.php");
require_once("backend/verify.php");
$nameUser = $_SESSION["nome"];
$cargoUser =  $_SESSION["cargo"];
$salarioUser =  $_SESSION["salario"];
$cpfUser =  $_SESSION["cpf"];
$idadeUser =  $_SESSION["idade"];
$email =  $_SESSION["email"];
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
    <link rel="stylesheet" href="src/css/perfil.css">
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
            <div class="perfil">
                <div class="image">
                    <img src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fceacopiniones.es%2Fwp-content%2Fuploads%2F2019%2F03%2Fuser-3-1024x1024.png&f=1&nofb=1&ipt=9ba6a8598468e7b2ecece3454dd72203f99ed162e85e433fad8d1fb030ab6232&ipo=images" alt="">
                </div>

                <div class="text">
                    <h2><?php echo $nameUser?></h2>
                    <p>(<?php echo $cargoUser?>)</p>
                </div>
            </div>

            <div class="my">
                <h1>Minhas Informações</h1>

                <div class="btn">
                    <button>Editar dados</button>
                    <button>Cadastrar Usuário</button>
                </div>
            </div>
            
            <div class="infos">
                <div class="infowraper">
                    <div class="inf">
                        <h2>E-mail:</h2>
                        <p><?php echo $email?></p>
                    </div>
                </div>
                <div class="infowraper">
                    <div class="inf">
                        <h2>Usuário:</h2>
                        <p><?php echo $nameUser?></p>
                    </div>
                </div>
                <div class="infowraper">
                    <div class="inf">
                        <h2>Senha:</h2>
                        <p><?php echo $_SESSION["senha"]?></p>
                    </div>
                </div>
                <div class="infowraper">
                    <div class="inf">
                        <h2>Cpf:</h2>
                        <p><?php echo $cpfUser?></p>
                    </div>
                </div>
                <div class="infowraper">
                    <div class="inf">
                        <h2>Cargo:</h2>
                        <p><?php echo $cargoUser?></p>
                    </div>
                </div>
                <div class="infowraper">
                    <div class="inf">
                        <h2>Idade:</h2>
                        <p><?php echo $idadeUser?></p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="src/js/main.js"></script>    
</body>
</html>