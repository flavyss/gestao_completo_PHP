<?php
require_once("conection/conection.php");

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
    $id = $_GET["id"];

    $sql = "DELETE FROM usuario WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    
    if ($stmt->execute()) {
        echo "Tarefa excluída com sucesso.";
        header("Location: ../funcionarios.php");
    } else {
        echo "Erro ao excluir a tarefa: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
