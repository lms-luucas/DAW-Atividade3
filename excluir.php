<?php 
    $id = $_GET["id"];

    $conexão = new mysqli("localhost", "root", "vertrigo", "dwa");

    $sql = $conexão->prepare("DELETE FROM alunos WHERE id=?"); 

    $sql->bind_param("i", $id);

    $sql->execute();

    mysqli_close($conexão);

    header("location: index.php");
?>