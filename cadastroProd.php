<?php
require_once("backend/conection/conection.php");
require_once("backend/verify.php");

$nameUser = $_SESSION["nome"];


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $titulo = $_POST["titulo"];
    $descricao = $_POST["descricao"];
    $preco = $_POST["preco"];
    $status = $_POST["status"];

    if ($_FILES["foto"]["error"] === UPLOAD_ERR_OK) {
        $file_name = $_FILES["foto"]["name"];
        $file_tmp = $_FILES["foto"]["tmp_name"];
        $file_path = "src/midia/uploads/" . $file_name; 

        if (move_uploaded_file($file_tmp, $file_path)) {
            $sql = "INSERT INTO produto (foto, titulo, descricao, preco, status) VALUES (?,?,?,?,?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sssss", $file_path, $titulo, $descricao, $preco, $status);

            if ($stmt->execute()) {
                echo "<script>alert('Item cadastrado com sucesso')</script>";
            } else {
                echo "Erro ao cadastrar item: " . $stmt->error;
            }
            $stmt->close();
        } else {
            echo "Erro ao mover o arquivo para o diretório de destino.";
        }
    } else {
        echo "Erro no upload do arquivo: " . $_FILES["foto"]["error"];
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
    <link rel="stylesheet" href="src/css/cadprod.css">
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
            </div>

            <div class="cadCont">
                <div class="cadCamp">
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="w50">
                            <p>Foto</p>
                            <input type="file" name="foto">
                        </div>
                        <div class="w50">
                            <p>Titulo</p>
                            <input type="text" name="titulo">
                        </div>
                        <div class="w100">
                            <p>descrição</p>
                            <textarea name="descricao" cols="30" rows="10"></textarea>
                        </div>
                        <div class="w50">
                            <p>preco</p>
                            <input type="text" name="preco">
                        </div>
                        <div class="w50">
                            <p>Status</p>
                            <select name="status">
                                <option value="">Escolha</option>
                                <option value="">Estoque</option>
                                <option value="">Loja</option>
                            </select>
                        </div>
                        <div class="w100s">
                            <input type="submit" value="cadastrar">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <script src="src/js/main.js"></script>
    <script src="src/js/cadastro.js"></script>
    
</body>
</html>