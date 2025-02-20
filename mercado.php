<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mercado</title>
</head>
<body>
    <?php 
    $conexao = mysqli_connect("localhost", "root", "VoucherDev@2024", "mercado");
                
    if(!$conexao){
        echo "falha na conexao: ". mysqli_connect_error();
    }else{
        echo "conectado ao banco";
    }

    $cliente = mysqli_real_escape_string($conexao, $_POST['cliente']);
    $cpf = mysqli_real_escape_string($conexao, $_POST['cpf']);
    $rg = mysqli_real_escape_string($conexao, $_POST['rg']);
    $datanasc = mysqli_real_escape_string($conexao, $_POST['datanasc']);
    $ocupacao = mysqli_real_escape_string($conexao, $_POST['ocupacao']);
    $fone = mysqli_real_escape_string($conexao, $_POST['fone']);
    $email = mysqli_real_escape_string($conexao, $_POST['email']);
    $cidade = mysqli_real_escape_string($conexao, $_POST['cidade']); 

    $sql = "INSERT INTO cadastro (cliente, cpf, rg, datanasc, ocupacao, fone, email, cidade) 
    values 
    ('$cliente', '$cpf', '$rg', '$datanasc', '$ocupacao', '$fone', '$email', '$cidade')";

    if(mysqli_query($conexao, $sql)){
        echo "usuario cadastrado com sucesso!";
    }else{
        echo "erro ao cadastrar usuario: ".mysql_error($conexao);
    };

    $sql_selecionar = "SELECT * FROM cadastro WHERE year(datanasc) <= 2007 ";

    $resultado = mysqli_query($conexao, $sql_selecionar);

    if(mysqli_num_rows($resultado) > 0){
        echo "<h2>Dados Cadastrados: </h2>";
        echo "<table border='1'>";
        echo "<tr><th>cliente</th><th>cpf</th><th>rg</th><th>datanasc</th>
        <th>ocupacao</th><th>fone</th><th>email</th><th>cidade</th></tr>";
        while($row = mysqli_fetch_assoc($resultado)){
            echo "<tr>";
            echo "<td>".$row["cliente"]."</td>";
            echo "<td>".$row["cpf"]."</td>";
            echo "<td>".$row["rg"]."</td>";
            echo "<td>".$row["datanasc"]."</td>";
            echo "<td>".$row["ocupacao"]."</td>";
            echo "<td>".$row["fone"]."</td>";
            echo "<td>".$row["email"]."</td>";
            echo "<td>".$row["cidade"]."</td>";
            echo "</tr>";
        }
        echo "</table>";
    }else {
        echo "Resultado não encontrado";
    };


    mysqli_close($conexao);

    ?>
</body>
</html>
