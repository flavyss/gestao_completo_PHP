<?php
require_once("backend/conection/conection.php");
require_once("backend/verify.php");
$nameUser = $_SESSION["nome"];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $iduser = $_SESSION["id_user"];
    $userm = $_SESSION["nome"];
    $cargou = $_SESSION["cargo"];
    $mes = $_POST["msg"];
    $title = $_POST["tit"];

    $sql = "INSERT INTO message (id_usuario, usuario, cargo, mensagem, titulo) VALUES (?,?,?,?,?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssss", $iduser, $userm, $cargou, $mes, $title);

    if ($stmt->execute()) {
        echo "<script>alert('post realizado com sucesso')</script>";
    } else {
        echo "Erro ao registrar: " . $stmt->error;
    }
    $stmt->close();
}

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
    <link rel="stylesheet" href="src/css/balanco.css">
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
            <aside class="pt1">
                <div class="user">
                    <h2>Bem vindo, <?php echo $nameUser?></h2>
                </div>
    
                <div class="panels">
                    <div class="panel">
                        <div class="psing" style="background-color: var(--bc);">
                            <h3><i class="fa-brands fa-think-peaks"></i></h3>
                            <h1>Total Produtos</h1>
                            <h3>22</h3>
                        </div>
                    </div>
    
                    <div class="panel">
                        <div class="psing" style="background-color: var(--bc);">
                            <h3><i class="fa-solid fa-shop"></i></h3>
                            <h1>Total Lojas</h1>
                            <h3>22</h3>
                        </div>
                    </div>
    
                    <div class="panel">
                        <div class="psing" style="background-color: var(--bc);">
                            <h3><i class="fa-solid fa-money-bill-trend-up"></i></h3>
                            <h1>Total Vendidos</h1>
                            <h3>22</h3>
                        </div>
                    </div>
    
                    <div class="panel">
                        <div class="psing">
                            <h3><i class="fa-solid fa-file-invoice-dollar"></i></h3>
                            <h1>Total Arrecadado</h1>
                            <h3> R$ 22,50</h3>
                        </div>
                    </div>
                </div>

                <div class="financeiro">
                    <h2>Financeiro</h2>

                    <div class="table">
                        <div class="titulo">
                            <div class="celula"><h3>Data</h3></div>
                            <div class="celula"><h3>Arrecadado</h3></div>
                            <div class="celula"><h3>Imposto</h3></div>
                            <div class="celula"><h3>Realocado</h3></div>
                            <div class="celula"><h3>Liquido</h3></div>
                        </div>
                        <div class="content">
                            <div class="celula">13/10/2003</div>
                            <div class="celula">1200,00</div>
                            <div class="celula">1200,00</div>
                            <div class="celula">1200,00</div>
                            <div class="celula">1200,00</div>
                        </div>
                        <div class="content">
                            <div class="celula">13/10/2003</div>
                            <div class="celula">1200,00</div>
                            <div class="celula">1200,00</div>
                            <div class="celula">1200,00</div>
                            <div class="celula">1200,00</div>
                        </div>
                        <div class="content">
                            <div class="celula">13/10/2003</div>
                            <div class="celula">1200,00</div>
                            <div class="celula">1200,00</div>
                            <div class="celula">1200,00</div>
                            <div class="celula">1200,00</div>
                        </div>
                        <div class="relocado">
                            <h4>estimativa de Realocamento:</h4>
                            <p>10% - infraestura</p>
                            <p>20% - funcionários</p>
                            <p>30% - dividas</p>
                            <p>40% - marketing</p>
                        </div>
                    </div>
                </div>

                <div class="avisos">
                    <div class="nwvs">
                        <h2>Avisos</h2>
                        <div class="nsing">
                            <button class="new">+ Criar Novo</button>
                        </div>
                    </div>


                    <?php
                        $sql = "SELECT id, usuario, cargo, mensagem, titulo FROM message";
                        $result = $conn->query($sql);
                        
                        $coments = array();
                        
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                $coments[] = $row;
                            }
                        }
                        
                        $conn->close();
                    
                    ?>
                        <div class="listf">
                            <?php foreach ($coments as $coment) { ?>
                            <div class="listwraper">
                                <div class="photo">
                                    <div class="pt2">
                                        <div class="image">
                                            <img src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fceacopiniones.es%2Fwp-content%2Fuploads%2F2019%2F03%2Fuser-3-1024x1024.png&f=1&nofb=1&ipt=9ba6a8598468e7b2ecece3454dd72203f99ed162e85e433fad8d1fb030ab6232&ipo=images" alt="">
                                        </div>
        
                                        <div class="nameuser">
                                            <h3><?php echo $coment["usuario"]?></h3>
                                            <p>(<?php echo $coment["cargo"]?>)</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="descr">
                                    <div class="tit">
                                        <h4><?php echo $coment["titulo"]?></h4>
                                        <p><?php echo $coment["mensagem"]?></p>
                                    </div>
                                </div>
                                <div class="like">
                                    <a href="">Responder Mensagem</a>
                                </div>
                            </div>
                            <?php }?>
                        </div>
                </div>
            </aside>
            <aside class="pt2">
                <h2>Analises de Produtos</h2>

                <div>
                    <canvas class="myChart"></canvas>
                </div>
                <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                
                <h2>Mais Vendidos</h2>

                <div class="vendidos">
                    <div class="topic">
                        <h4>titulo do produto</h4>
                        <div class="dot"></div>
                        <p>R$ 20,00</p>
                    </div>
                    
                    <div class="topic">
                        <h4>titulo do produto</h4>
                        <div class="dot"></div>
                        <p>R$ 20,00</p>
                    </div>

                    <div class="topic">
                        <h4>titulo do produto</h4>
                        <div class="dot"></div>
                        <p>R$ 20,00</p>
                    </div>

                    <div class="topic">
                        <h4>titulo do produto</h4>
                        <div class="dot"></div>
                        <p>R$ 20,00</p>
                    </div>

                    <div class="topic">
                        <h4>titulo do produto</h4>
                        <div class="dot"></div>
                        <p>R$ 20,00</p>
                    </div>

                    <div class="topic">
                        <h4>titulo do produto</h4>
                        <div class="dot"></div>
                        <p>R$ 20,00</p>
                    </div>

                    <div class="topic">
                        <h4>titulo do produto</h4>
                        <div class="dot"></div>
                        <p>R$ 20,00</p>
                    </div>

                    <div class="topic">
                        <h4>titulo do produto</h4>
                        <div class="dot"></div>
                        <p>R$ 20,00</p>
                    </div>

                    <div class="topic">
                        <h4>titulo do produto</h4>
                        <div class="dot"></div>
                        <p>R$ 20,00</p>
                    </div>

                    <div class="topic">
                        <h4>titulo do produto</h4>
                        <div class="dot"></div>
                        <p>R$ 20,00</p>
                    </div>

                    <div class="topic">
                        <h4>titulo do produto</h4>
                        <div class="dot"></div>
                        <p>R$ 20,00</p>
                    </div>

                    <div class="topic">
                        <h4>titulo do produto</h4>
                        <div class="dot"></div>
                        <p>R$ 20,00</p>
                    </div>

                    <div class="topic">
                        <h4>titulo do produto</h4>
                        <div class="dot"></div>
                        <p>R$ 20,00</p>
                    </div>

                    <div class="topic">
                        <h4>titulo do produto</h4>
                        <div class="dot"></div>
                        <p>R$ 20,00</p>
                    </div>

                    <div class="topic">
                        <h4>titulo do produto</h4>
                        <div class="dot"></div>
                        <p>R$ 20,00</p>
                    </div>

                    <div class="topic">
                        <h4>titulo do produto</h4>
                        <div class="dot"></div>
                        <p>R$ 20,00</p>
                    </div>

                    <div class="topic">
                        <h4>titulo do produto</h4>
                        <div class="dot"></div>
                        <p>R$ 20,00</p>
                    </div>

                    <div class="topic">
                        <h4>titulo do produto</h4>
                        <div class="dot"></div>
                        <p>R$ 20,00</p>
                    </div>
                </div>
                
            </aside>
        </div>
    </section>
    

    <div class="message">
        <div class="messagecont">
        <div class="ex">
            <h2>Envie sua Mensagem</h2>
            <div class="fechado">
            <i class="fa-solid fa-circle-xmark"></i>
            </div>
        </div>
        <form action="" method="post">
            <div class="w100">
                <p>Titulo da Mensagem</p>
                <input type="text" name="tit">
            </div>
            <div class="w100">
                <p>Mensagem</p>
                <textarea name="msg" id="" cols="30" rows="10"></textarea>
            </div>

            <div class="w100s">
                <input type="submit" name="Publicar">
            </div>
        </form>
        </div>
    </div>
        
    <script src="src/js/main.js"></script>    
    <script src="src/js/graf.js"></script>
    <script src="src/js/message.js"></script>
</body>
</html>