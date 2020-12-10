<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container-fluid">
       <div class="row">
            <div class="col-5" >
                <form action="processos.php" method="POST" class="row" id="form">
                    
                    <h4 class="col-12">Cadastrar Aluno</h4>
                    
                    <div class="col-12">
                        <label for="nome">Nome: </label>
                        <input type="text" name="nome" class="form-control">
                    </div>

                    <div class="col-6">
                        <label for="nascimento"></label> Data de nascimento:
                        <input type="date" name="nascimento" class="form-control">
                    </div>

                    <div class="col-6">
                        <label for="ano"></label> Ano:
                        <input type="text" name="ano" class="form-control">
                    </div>

                    <div class="col-12">
                        <label for="materia"></label> Materia preferida:
                        <input type="text" name="materia" class="form-control">   
                    </div>

                    <div class="col-12" id="buttons">
                        <button type="submit" class="btn btn-success">Salvar</button>
                        <button type="reset" class="btn btn-primary">Limpar</button>
                    </div>
                </form>
            </div>
            <div class="col-6" id="table">
                <div class="contant" class="row">
                            
                    <h4 class="col-12">Alunos Cadastrados</h4>                            
                
                    <div class="col-12" id="filtro">
                        <label for="">Filtrar</label>
                        <input type="text" name="" id="" class="form-control">
                    </div>

                    <div>
                    <table class="table table-striped">
                    <thead>
                        <tr>
                        <th scope="col">Nome</th>
                        <th scope="col">Nascimento</th>
                        <th scope="col">Ano</th>
                        <th scope="col">Materia</th>
                        <th scope="col">Excluir</th>
                        <th scope="col">Editar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                             $conexão = new mysqli("localhost", "root", "vertrigo", "dwa");
                             $tabela = $conexão->query("SELECT * FROM alunos");

                             while ($linha = $tabela->fetch_assoc()) {
                        ?>
                                <tr>
                                    <td> <?=$linha["nome"];?> </td>
                                    <td> <?=$linha["nascimento"];?> </td>
                                    <td> <?=$linha["ano"];?> </td>
                                    <td> <?=$linha["materia"];?> </td>
                                    <td>
                                        <a href="excluir.php?id=<?=$linha["id"] ?>" onclick="return confirm('Tem certeza?');">Excluir</a>
                                    </td>
                                    <td>
                                        <a href="excluir.php?id=<?=$linha["id"] ?>">Editar</a>
                                    </td>
                                 </tr>
                        <?php 
                             }
                             mysqli_close($conexão);
                        ?>
                    </tbody>
                    </table>
                    </div>
                </div>
            </div>      
       </div>
    </div>
</body>
</html>