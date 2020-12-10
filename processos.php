<?php
    $nome = $_POST["nome"];
    $nascimento = $_POST["nascimento"];
    $ano = $_POST["ano"];
    $materia = $_POST["materia"];

    $conexão = new mysqli("localhost", "root", "vertrigo", "dwa");

    $sql = $conexão->prepare("INSERT INTO alunos (nome, nascimento, ano, materia) VALUES (?,?,?,?)"); 

    $sql->bind_param("ssss", $nome, $nascimento, $ano, $materia);

    $sql->execute();

    mysqli_close($conexão);

    header("location: index.php");
?>