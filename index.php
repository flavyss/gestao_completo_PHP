<?php
require_once("backend/conection/conection.php");
require_once("backend/verify.php");
$nameUser = $_SESSION["nome"];

$sql = "SELECT id, foto, titulo, descricao, preco, status FROM produto";
$result = $conn->query($sql);

$items = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $items[] = $row;
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
    <link rel="stylesheet" href="src/css/index.css">
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
                    <li><a href="backend/logout.php">Sair</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <section>
        <div class="container">
            <div class="user">
                <h1>Bem vindo, <?php echo $nameUser?></h1>

                <div class="list">
                    <h1 class="tb"><i class="fa-solid fa-table-cells"></i></h1>
                    <h1 class="lt"><i class="fa-solid fa-list"></i></h1>

                    <div class="filter">
                        <select name="" id="">
                            <option value="">Estoque</option>
                            <option value="">Loja</option>
                            <option value="">Vendido</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="grid">
                <div class="contGrid">
                <?php foreach ($items as $item) { ?>

                    <div class="gridWraper">
                        <div class="gridSing">
                            
                            <div class="photo">
                                <img src="<?php echo $item['foto']?>" alt="">
                            </div>

                            <div class="txt">
                                <div class="tit">
                                    <h1><?php echo $item['titulo']?></h1>
                                </div>
                                <div class="descript">
                                    <p><?php echo $item['descricao']?></p>
                                </div>
                            </div>

                              <div class="price">
                                    <p><?php echo $item['preco']?> R$</p>
                                </div>

                            <div class="btn">
                                <button>Editar</button>
                                <button><a href="backend/excluir.php?id=<?php echo $item['id']; ?>">Excluir</a></button>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                </div>
            </div>

            <div class="lista some" >
                <div class="listWraper">

                <?php foreach ($items as $item) { ?>
                    <div class="listSing">
                        
                        <div class="photo">
                            <img src="<?php echo $item['foto']?>" alt="">
                        </div>

                        <div class="txt">
                            <div class="tit">
                                <h1><?php echo $item['titulo']?></h1>
                            </div>
                            <div class="descript">
                                <p><?php echo $item['descricao']?></p>
                            </div>
                        </div>

                          <div class="price">
                                <p><?php echo $item['preco']?> R$</p>
                            </div>

                        <div class="btn">
                            <button>Editar</button>
                            <button><a href="backend/excluir.php?id=<?php echo $item['id']; ?>">Excluir</a></button>

                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </section>

    <script src="src/js/main.js"></script>
    
</body>
</html>